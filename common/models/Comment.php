<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property int $id
 * @property string $comment
 * @property string $video_id
 * @property int|null $parent_id
 * @property int|null $pinned
 * @property string $mention
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property int|null $created_by
 * @property Comment[] $comments
 * @property User $createdBy
 * @property Comment $parent
 * @property Video $video
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false,
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment', 'video_id'], 'required'],
            [['comment'], 'string'],
            [['parent_id', 'pinned', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['video_id'], 'string', 'max' => 16],
            [['mention'], 'string', 'max' => 100],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::class, 'targetAttribute' => ['parent_id' => 'id']],
            [['video_id'], 'exist', 'skipOnError' => true, 'targetClass' => Video::class, 'targetAttribute' => ['video_id' => 'video_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment' => 'Комментарий',
            'video_id' => 'Video ID',
            'parent_id' => 'Parent ID',
            'pinned' => 'Закреплён',
            'mention' => 'Упоминание',
            'created_at' => 'Оставлен',
            'updated_at' => 'Редактирован',
            'created_by' => 'Создан',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CommentQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CommentQuery
     */
    public function getParent()
    {
        return $this->hasOne(Comment::class, ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[Video]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\VideoQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Video::class, ['video_id' => 'video_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CommentQuery(get_called_class());
    }

    public function belongsTo($userId)
    {
        return $this->created_by === $userId;
    }
}
