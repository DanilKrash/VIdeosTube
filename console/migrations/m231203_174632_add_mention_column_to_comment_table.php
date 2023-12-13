<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%comment}}`.
 */
class m231203_174632_add_mention_column_to_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%comment}}', 'mention', $this->string(100)->after('pinned'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%comment}}', 'mention', $this->string(100));
    }
}
