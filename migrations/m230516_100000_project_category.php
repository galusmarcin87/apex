<?php

use yii\db\Migration;

/**
 * Class m171121_120201_user
 */
class m230516_100000_project_category extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('project', 'category_id', $this->integer());
        $this->addForeignKey('project_category_fk', 'project','category_id','category','id');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('project', 'category_id');

    }
}
