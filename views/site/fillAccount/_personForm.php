<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\mgcms\db\User*/


?>
<?= $this->render('_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'first_name', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
<?= $this->render('_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'last_name', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>

<?= $this->render('_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'pesel', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
<?= $this->render('_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'bank_no', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>


<?= $this->render('_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'country', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
<?= $this->render('_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'postcode', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
<?= $this->render('_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'city', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>

<?= $this->render('_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'address', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>



