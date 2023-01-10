<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Project;
use yii\bootstrap\ActiveForm;
use yii\web\View;

$slider = \app\models\mgcms\db\Slider::find()->where(['name' => 'main', 'language' => Yii::$app->language])->one();
if (!$slider) {
    return false;
}
?>

<section class="Slider">
    <div class="owl-carousel owl-theme">
        <? foreach ($slider->slides as $index => $slide): ?>
            <div class="item">
                <div
                        class="Slider__item"
                        <? if ($slide->file && $slide->file->isImage()): ?>style="background-image: url(<?= $slide->file->getImageSrc() ?>)"<? endif ?>
                >
                    <div class="container">
                        <div class="Slider__description">
                            <div class="Slider__description__header">
                                <?= $slide->header?>
                            </div>
                            <a class="btn btn-secondary" href="<?= $slide->link?>"
                            ><?= Yii::t('db', 'Investition details') ?></a
                            >
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach ?>

    </div>
</section>
