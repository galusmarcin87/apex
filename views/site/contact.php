<?php
/* @var $this yii\web\View */

/* @var $model \app\models\ContactForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;

$this->title = MgHelpers::getSettingTranslated('contact_header', 'Contact');


?>

<?= $this->render('/common/breadcrumps') ?>

    <section class="Section Section--big-padding-top Contact">
        <div class="container">
            <h6 class="text-center"><b><?= Yii::t('db', 'CONTACT') ?></b></h6>
            <div class="Contact__map-wrapper">
                <div id="map" class="Contact__map"></div>
                <a href="http://maps.google.com/maps?q=<?= MgHelpers::getSetting('contact_map_lat', false, '52.249502') ?>,<?= MgHelpers::getSetting('contact_map_long', false, '21.0435739') ?>"
                   class="btn btn-secondary"><?= Yii::t('db', 'Check how to get') ?></a>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="Contact__desc">
                        <?= MgHelpers::getSettingTypeText('contact 1 text' . Yii::$app->language, false, 'APEX CAPITAL WIZARD SP. Z O.O. <br/>
                    ul. Bolesława Prusa 2 <br/>
                    00-433 Warszawa') ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Contact__desc">
                        <?= MgHelpers::getSettingTypeText('contact 2 text' . Yii::$app->language, false, 'KRS 0000308064 <br/>
                    NIP 1251496849 <br/>
                    REGON 141463239') ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="Contact__desc">
                        <? $phone = MgHelpers::getSettingTypeText('contact phone', false, 'contact phone') ?>
                        <? $email = MgHelpers::getSettingTypeText('contact email', false, 'email') ?>

                        <a href="tel:<?= $phone ?>"><?= $phone ?></a><br/>
                        <a class="underline" href="mailto:<?= $email ?>"
                        ><?= $email ?></a
                        >
                    </div>
                </div>
            </div>
            <div class="Contact-form">
                <div class="text-center">
                    <h6><?= Yii::t('db', 'Send us a message') ?></h6>
                </div>
                <?php
                $form = ActiveForm::begin([
                    'id' => 'contact-form',
                    'fieldConfig' => \app\components\ProjectHelper::getFormFieldConfig(false),
                    'options' => [
                        'class' => 'contact__form'
                    ]
                ]);

                echo $form->errorSummary($model);
                ?>
                <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($model, 'name')->textInput(['placeholder' => $model->getAttributeLabel('name')]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'email')->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'phone')->textInput(['placeholder' => $model->getAttributeLabel('phone')]) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'subject')->textInput(['placeholder' => $model->getAttributeLabel('subject')]) ?>
                    </div>
                </div>
                <?= $form->field($model, 'body')->textarea(['placeholder' => $model->getAttributeLabel('body'), 'rows' => 4]) ?>

                <div class="row">
                    <div class="col-xl-9">
                        <?= $form->field($model, 'acceptTerms',
                            [
                                'options' => [
                                    'class' => "Form__group form-group",
                                ],
                                'checkboxTemplate' => "{input}\n{label}\n{error}",
                            ]
                        )->checkbox(['class' => 'Form__checkbox']) ?>

                    </div>
                    <div class="col-md-3">
                        <div class="text-right">
                            <button
                                    type="submit"
                                    class="Contact-form__submit btn btn-secondary btn-block"
                            >
                                <?= Yii::t('db', 'Send message') ?>
                            </button>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </section>


<?= $this->render('contact/script') ?>
<?= $this->render('/common/team') ?>
<?= $this->render('/common/newsletterForm') ?>
