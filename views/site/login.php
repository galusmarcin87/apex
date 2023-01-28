<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

/* @var $modelRegister app\models\RegisterForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\components\mgcms\MgHelpers;
use yii\authclient\widgets\AuthChoice;
use yii\helpers\Url;


$this->title = Yii::t('db', 'Log in/Register');
$this->params['breadcrumbs'][] = $this->title;
$fieldConfig = \app\components\ProjectHelper::getFormFieldConfig(false);

//https://yii2-framework.readthedocs.io/en/stable/guide/security-auth-clients/
?>

<?= $this->render('/common/breadcrumps') ?>

<section class="Section Contact">
    <div class="container">
        <div class="Contact__grid">
            <div class="Contact-form Contact-form--border">
                <div class="Contact-form__header">
                    <?= Yii::t('db', 'Login') ?>
                    <img class="Header-icon__icon" src="/svg/znaczek.svg" alt=""/>
                </div>
                <?php
                $form = ActiveForm::begin([
                    'id' => 'contact__form',
                    'fieldConfig' => $fieldConfig,
                    'options' => ['class' => 'contact__form']
                ]);

                echo $form->errorSummary($model);
                ?>

                <?= $form->field($model, 'username')->textInput([
                    'type' => 'text',
                    'required' => true,
                    'placeholder' => $model->getAttributeLabel('username')]) ?>

                <?= $form->field($model, 'password')->textInput([
                    'type' => 'password',
                    'required' => true,
                    'placeholder' => $model->getAttributeLabel('password')]) ?>

                <div class="Form__group form-group text-left">
                    <input type="hidden" name="LoginForm[rememberMe]" value="0">
                    <input
                            name="LoginForm[rememberMe]"
                            class="Form__checkbox"
                            type="checkbox"
                            id="rememberMe"
                            value="1"
                            checked
                            required
                    />
                    <label for="rememberMe"> <?= Yii::t('db', 'Remember me') ?> </label>
                    <!-- <a class="Contact__remember-password pull-right" href="#"
                      >Nie pamiętasz chasła?</a
                    > -->
                </div>
                <div class="text-center">
                    <input
                            style="margin-top: 182px !important"
                            type="submit"
                            class="Contact-form__submit btn btn-secondary btn-block"
                            value="<?= Yii::t('db', 'Log in') ?>"
                    />
                </div>
                <div class="Contact-form__other-login hidden">
                    Inne możliwośći logowania
                    <img class="Header-icon__icon" src="./svg/znaczek.svg" alt=""/>
                </div>
                <div class="Contact-form__socials hidden">
                    <div>
                        <a href="#" class="btn btn-social">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="btn btn-social">
                            <i class="fa fa-google" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="btn btn-social">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>


            <div class="Contact-form Contact-form--border">
                <div class="Contact-form__header">
                    <?= Yii::t('db', 'Register') ?>
                    <img class="Header-icon__icon" src="/svg/znaczek.svg" alt=""/>
                </div>
                <?php
                $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => $fieldConfig
                ]);
                echo $form->errorSummary($modelRegister);

                ?>
                <?= $form->field($modelRegister, 'username')->textInput(['required' => true, 'placeholder' => $modelRegister->getAttributeLabel('username')]) ?>
                <?= $form->field($modelRegister, 'password')->passwordInput(['required' => true, 'placeholder' => $modelRegister->getAttributeLabel('password')]) ?>
                <?= $form->field($modelRegister, 'passwordRepeat')->passwordInput(['required' => true, 'placeholder' => $modelRegister->getAttributeLabel('passwordRepeat')]) ?>

                <?= $form->field($modelRegister, 'firstName')->textInput(['required' => true, 'placeholder' => $modelRegister->getAttributeLabel('firstName')]) ?>
                <?= $form->field($modelRegister, 'surname')->textInput(['required' => true, 'placeholder' => $modelRegister->getAttributeLabel('surname')]) ?>
                <?= $form->field($modelRegister, 'city')->textInput(['required' => true, 'placeholder' => $modelRegister->getAttributeLabel('city')]) ?>
                <?= $form->field($modelRegister, 'phone')->textInput(['required' => true, 'placeholder' => $modelRegister->getAttributeLabel('phone')]) ?>
                <?= $this->render('login/acceptCheckbox',['number' => '','form'=> $form, 'modelRegister' => $modelRegister])?>


                <div class="text-center">
                    <input
                            type="submit"
                            onclick="return checkTerms()"
                            class="Contact-form__submit btn btn-secondary btn-block"
                            value="<?= Yii::t('db', 'Register') ?>"
                    />
                </div>
                <div class="Contact-form__other-login hidden">
                    Inne możliwośći logowania
                    <img class="Header-icon__icon" src="./svg/znaczek.svg" alt=""/>
                </div>
                <div class="Contact-form__socials hidden">
                    <div>
                        <a href="#" class="btn btn-social">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="btn btn-social">
                            <i class="fa fa-google" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="btn btn-social">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>


<script>
    function checkTerms(){
        const reqTerms = ['acceptTerms'];
        let alertSent = false;
        for(var i = 0; i < reqTerms.length; i++){
            if(!$('.Form__checkbox[name="RegisterForm['+reqTerms[i]+']"]').is(':checked') && !alertSent){
                alertSent = true;
                alert('<?= Yii::t('db','Check all terms')?>');
            }
        }
    }
</script>
