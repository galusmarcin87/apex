<?php

use yii\web\View;
use app\components\mgcms\MgHelpers;


/* @var $this yii\web\View */

$this->title = Yii::t('db', 'About us');

?>

<?= $this->render('/common/breadcrumps')?>

<section class="Section" style="padding-top: 30px; padding-bottom: 0">
    <div class="container">
        <h6 class="text-center" style="margin-bottom: 40px">
            <?= MgHelpers::getSettingTypeText('about us 1 header ' . Yii::$app->language, false, 'about us 1 header'); ?>
        </h6>
        <h1 class="text-center">
            <?= MgHelpers::getSettingTypeText('about us 1 header 2 ' . Yii::$app->language, false, 'about us 1 header 2'); ?>
        </h1>
        <div class="row">
            <div class="col-md-5">
                <?= MgHelpers::getSettingTypeText('about us1  left text ' . Yii::$app->language, true, '<p>about us 1 left text</p>'); ?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-sm-6">
                <img src="<?= MgHelpers::getSettingTypeText('about us 1 right image ' . Yii::$app->language, false, '/images/img_5.jpg'); ?>" />
            </div>
        </div>
    </div>
</section>

<section class="Section Section--white" style="padding-bottom: 0">
    <div class="container">
        <h6 class="text-center" style="margin-bottom: 25px">
            <?= MgHelpers::getSettingTypeText('about us 2 header ' . Yii::$app->language, false, 'about us 2 header'); ?>
        </h6>
        <div class="row">
            <div class="col-md-3">
                <div class="big-text counter">
                    <span data-to="<?= MgHelpers::getSettingTypeText('about us 2 number 1 ' . Yii::$app->language, false, '18'); ?>">0</span>
                    <p class="small">
                        <?= MgHelpers::getSettingTypeText('about us 2 number 1 text' . Yii::$app->language, false, 'about us 2 number 1 text'); ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="big-text counter">
                    <span data-to="<?= MgHelpers::getSettingTypeText('about us 2 number 2 ' . Yii::$app->language, false, '18'); ?>">0</span>
                    <p class="small">
                        <?= MgHelpers::getSettingTypeText('about us 2 number 2 text' . Yii::$app->language, false, 'about us 2 number 2 text'); ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="big-text counter">
                    <span data-to="<?= MgHelpers::getSettingTypeText('about us 2 number 3 ' . Yii::$app->language, false, '18'); ?>">0</span>
                    <p class="small">
                        <?= MgHelpers::getSettingTypeText('about us 2 number 3 text' . Yii::$app->language, false, 'about us 2 number 3 text'); ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="big-text counter">
                    <span data-to="<?= MgHelpers::getSettingTypeText('about us 2 number 4 ' . Yii::$app->language, false, '18'); ?>">0</span>
                    <p class="small">
                        <?= MgHelpers::getSettingTypeText('about us 2 number 4 text' . Yii::$app->language, false, 'about us 2 number 4 text'); ?>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="Section Section--white">
    <div class="container">
        <h6 class="text-center" style="margin-bottom: 25px">
            <?= MgHelpers::getSettingTypeText('about us 3 header ' . Yii::$app->language, false, 'about us 3 header'); ?>
        </h6>
        <ul class="List-custm__checklist">
            <li class="List-custm__checklist__item">
                <strong><?= MgHelpers::getSettingTypeText('about us 3 box 1 header ' . Yii::$app->language, false, 'about us 3 box 1 header'); ?></strong>
                <?= MgHelpers::getSettingTypeText('about us 3 box 1 text ' . Yii::$app->language, false, 'about us 3 box 1 text'); ?>
            </li>
            <li class="List-custm__checklist__item">
                <strong><?= MgHelpers::getSettingTypeText('about us 3 box 2 header ' . Yii::$app->language, false, 'about us 3 box 2 header'); ?></strong>
                <?= MgHelpers::getSettingTypeText('about us 3 box 2 text ' . Yii::$app->language, false, 'about us 3 box 2 text'); ?>
            </li>
            <li class="List-custm__checklist__item">
                <strong><?= MgHelpers::getSettingTypeText('about us 3 box 3 header ' . Yii::$app->language, false, 'about us 3 box 3 header'); ?></strong>
                <?= MgHelpers::getSettingTypeText('about us 3 box 3 text ' . Yii::$app->language, false, 'about us 3 box 3 text'); ?>
            </li>
            <li class="List-custm__checklist__item">
                <strong><?= MgHelpers::getSettingTypeText('about us 3 box 4 header ' . Yii::$app->language, false, 'about us 3 box 4 header'); ?></strong>
                <?= MgHelpers::getSettingTypeText('about us 3 box 4 text ' . Yii::$app->language, false, 'about us 3 box 4 text'); ?>
            </li>
        </ul>
    </div>
</section>


<section style="padding-bottom: 100px">
    <div class="container">
        <div class="banner-wrapper">
            <div
                    class="banner"
                    style="background-image: url( <?= MgHelpers::getSettingTypeText('about us 4 image ' . Yii::$app->language, false, '/images/banner_6.jpg'); ?>)"
            >
                <div>
                    <?= MgHelpers::getSettingTypeText('about us 4 header ' . Yii::$app->language, false, 'about us 4 header'); ?>
                    <p>
                        <?= MgHelpers::getSettingTypeText('about us 4 text ' . Yii::$app->language, false, 'about us 4 text'); ?>
                    </p>
                    <a class="btn btn-secondary" href="<?= \yii\helpers\Url::to('/project/index')?>">
                        <?= Yii::t('db', 'See projects') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->render('/common/team')?>
<?= $this->render('/common/faq') ?>
<?= $this->render('/common/cooperateWith') ?>
<?= $this->render('/common/newsletterForm') ?>
