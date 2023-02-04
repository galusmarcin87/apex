<?php

use yii\db\Migration;

/**
 * Class m171121_120201_user
 */
class m230131_100000_user_fields extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('user', 'bank', $this->string(255));
        $this->addColumn('user', 'tax_office', $this->string(255));
        $this->addColumn('user', 'district', $this->string(255));

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {

    }
}
