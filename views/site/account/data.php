<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\mgcms\db\User */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;
use yii\bootstrap\Tabs;

$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(true);

?>

<section class="Section Section--big-padding-top Contact fillAccount accountMyData">
    <div class="">
        <?php
        $form = ActiveForm::begin([
            'id' => 'login-form',
            'class' => 'fadeInUpShort animated delay-250',
            'fieldConfig' => $fieldConfig
        ]);

        //          echo $form->errorSummary($model);
        ?>
        <?= MgHelpers::getSettingTypeText('my account my data text', true, '<p>my account my data text</p>') ?>

        <div class="row">
            <div class="col-md-6">
                <legend><?= Yii::t('db', 'Personal data') ?></legend>
                <?= $this->render('../fillAccount/_personForm', ['form' => $form, 'model' => $model]) ?>
                <legend class="p-3"><?= Yii::t('db', 'Addres for corespondence') ?>
                    <button type="button" class="btn btn-primary pull-right" id="copyToCorrespondence"><?= Yii::t('db', 'Copy') ?></button>
                </legend>

                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'cor_postcode', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'cor_city', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'cor_street', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'cor_house_no', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'cor_flat_no', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
            </div>

            <div class="col-md-6">
                <legend><?= Yii::t('db', 'Contact data') ?></legend>
                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'phone', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'email', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>

                <legend><?= Yii::t('db', 'Residence address') ?></legend>
                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'postcode', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'city', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'street', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'house_no', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'flat_no', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'voivodeship', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'county', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>
                <?= $this->render('../fillAccount/_field', ['width' => 12, 'form' => $form, 'model' => $model, 'attribute' => 'district', 'required' => true, 'addOpts' => ['disabled' => false]]) ?>

            </div>


        </div>


        <div class="row bottom10">
            <div class="col-md-3 offset-3">
                <button type="submit" class="btn btn-primary"
                        onclick="return confirm('<?= Yii::t('db', 'Are you sure to make changes?') ?>')">
                    <?= Yii::t('db', 'Save changes') ?>
                </button>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</section>

<script type="text/javascript">
    function copyToCorrespondence(){

        const fields = ['postcode','city','street','house_no','flat_no'];
        fields.forEach( (field)=>{
            $('#user-cor_'+field).val($('#user-'+field).val());
        });
    }
    $('#copyToCorrespondence').on('click',copyToCorrespondence);
</script>
