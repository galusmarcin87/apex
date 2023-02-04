<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\mgcms\db\User*/

use app\components\mgcms\MgHelpers;
?>
<?= $this->render('_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'first_name', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
<?= $this->render('_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'last_name', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>

<?= $this->render('_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'pesel', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
<?= $this->render('_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'bank_no', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>

<div class="col-md-12">
    <?= $form->field($model, 'bank')->dropDownList(MgHelpers::arrayKeyValueFromArray(MgHelpers::getSettingsArray('banki'))) ?>
</div>

<?= $this->render('_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'tax_office', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
