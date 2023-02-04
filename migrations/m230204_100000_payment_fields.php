<?php

use yii\db\Migration;

/**
 * Class m171121_120201_user
 */
class m230204_100000_payment_fields extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('payment', 'is_company', $this->tinyInteger(2));
        $this->addColumn('payment', 'tax_id_type', $this->string(10));
        $this->addColumn('payment', 'pit_transfer_form', $this->string(20));
        $this->addColumn('payment', 'notarial_act_city', $this->string(255));
        $this->addColumn('payment', 'notarial_act_day', $this->date());
        $this->addColumn('payment', 'notarial_act_hour', $this->string(10));
        $this->addColumn('payment', 'notarial_act_day2', $this->date());
        $this->addColumn('payment', 'notarial_act_hour2', $this->string(10));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {

    }
}
