<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;

$faq = \app\models\mgcms\db\Faq::find()->where(['lang' => Yii::$app->language, 'type' => \app\models\mgcms\db\Faq::TYPE_FAQ])->one();
if (!$faq) {
    return false;
}

?>


<section class="Section Section--light-background" style="padding-bottom: 0;">
    <div class="container">
        <h1 class="text-center" style="margin-bottom: 70px;"><?= Yii::t('db', 'FAQ') ?></h1>
        <div
                class="Accordion"
                id="accordion_custom"
                role="tablist"
        >
            <div class="Accordion__tabs">
                <? foreach ($faq->faqItems as $item): ?>
                    <?= $this->render('/faq/_index',['model' => $item])?>
                <? endforeach; ?>


            </div>
        </div>
    </div>
</section>


