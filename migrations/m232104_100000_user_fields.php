<?php

use yii\db\Migration;

/**
 * Class m171121_120201_user
 */
class m232104_100000_user_fields extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('user', 'county', $this->string(255));

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {

    }
}
