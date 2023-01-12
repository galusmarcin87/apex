<?

use yii\bootstrap\ActiveForm;
use yii\web\View;
use app\components\mgcms\MgHelpers;

/* @var $this yii\web\View */

?>

<section class="Section text-center Section--fixed-bg" style="background-image: url(/images/Depositphotos_162121398_XL.png);">
    <div class="container">
        <div class="row">
            <div class="Newsletter">
                <div class="col-lg-10 offset-lg-1">
                    <h2><?= Yii::t('db', 'Investor area') ?></h2>
                    <?= MgHelpers::getSettingTypeText('strefa inwestora - text ' . Yii::$app->language,true, 'strefa inwestora - text')?>
                    <?php $form = ActiveForm::begin(['id' => 'newsletter-form', 'class' => 'fadeIn animated']); ?>
                        <div class="Newsletter__inner">
                            <div class="Form__group form-group">
                                <input
                                        class="Form__input form-control"
                                        placeholder="&nbsp;"
                                        id="email"
                                        name="newsletterEmail"
                                        type="email"
                                        required
                                />
                                <label class="Form__label" for="email"
                                ><?= Yii::t('db', 'Email address') ?></label>

                                <button class="btn btn-secondary lowercase" type="submit" onclick="return checkNewsletterForm()"><?= Yii::t('db', 'Sign in') ?></button>
                            </div>
                        </div>
                        <div class="Form__group form-group text-left">
                            <input class="Form__checkbox" type="checkbox" id="agree-1" />
                            <label for="agree-1">
                                <?= MgHelpers::getSettingTypeText('strefa inwestora - zgoda 1 ' .Yii::$app->language, true,'strefa inwestora - zgoda 1 ')?>
                            </label>
                        </div>
                        <div class="Form__group form-group text-left">
                            <input class="Form__checkbox" type="checkbox" id="agree-2" />
                            <label for="agree-2">
                                <?= MgHelpers::getSettingTypeText('strefa inwestora - zgoda 2 ' .Yii::$app->language, true,'strefa inwestora - zgoda 2 ')?>
                            </label>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function checkNewsletterForm(){
        if($('#agree-1').is(':checked') && $('#agree-2').is(':checked')){
            return true;
        }else{
            alert('<?= Yii::t('db', ' You have to check all agreements' )?>');
            return false;
        }
    }
</script>
