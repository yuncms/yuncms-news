<?php

namespace yuncms\news\migrations;

use yii\db\Migration;

class M171124095845Add_column_of_user_extra extends Migration
{

    public function safeUp()
    {
        $this->addColumn('{{%user_extra}}', 'news', $this->integer()->unsigned()->defaultValue(0)->comment('News'));

    }

    public function safeDown()
    {
        $this->dropColumn('{{%user_extra}}', 'news');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M171124095845Add_column_of_user_extra cannot be reverted.\n";

        return false;
    }
    */
}
