<?php

namespace yuncms\news\migrations;

use yii\db\Migration;

class M171124093110Create_news_table extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey()->unsigned()->comment('ID'),
            'user_id' => $this->integer()->unsigned()->notNull()->comment('User ID'),
            'slug' => $this->string()->comment('Slug'),
            'title' => $this->string(80)->notNull()->comment('Title'),
            'description' => $this->string()->comment('Description'),
            'status' => $this->smallInteger(1)->unsigned()->defaultValue(0)->comment('Status'),
            'views' => $this->integer()->defaultValue(0)->comment('Views'),
            'url' => $this->string()->notNull()->comment('Url'),
            'supports' => $this->integer()->unsigned()->defaultValue(0)->comment('Supports'),
            'published_at' => $this->integer()->comment('Published At'),
            'created_at' => $this->integer()->notNull()->comment('Created At'),
            'updated_at' => $this->integer()->notNull()->comment('Updated At'),
        ], $tableOptions);
        $this->createIndex('{{%news_index_status}}', '{{%news}}', 'status');
        $this->createIndex('{{%news_index_published_at}}', '{{%news}}', 'published_at');
        $this->addForeignKey('{{%news_fk_1}}', '{{%news}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M171124093110Create_news_table cannot be reverted.\n";

        return false;
    }
    */
}
