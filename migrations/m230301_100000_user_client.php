<?php

use yii\db\Migration;

/**
 * Class m171121_120201_user
 */
class m230301_100000_user_client extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('user', 'adviser_id', $this->integer(11));
        $this->addForeignKey('fk_user_adviser', 'user', 'adviser_id', 'user', 'id');

        $this->addColumn('user', 'additional_information', $this->text());

        $this->addColumn('user', 'project_id', $this->integer(11));
        $this->addForeignKey('fk_project_user', 'user', 'project_id', 'project', 'id');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_project','user');
        $this->dropColumn('user','project_id');
    }
}
