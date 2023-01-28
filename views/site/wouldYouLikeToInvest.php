<?php

use yii\web\View;
use app\components\mgcms\MgHelpers;


/* @var $this yii\web\View */

$this->title = Yii::t('db', 'Would you like to invest?');

?>

<?= $this->render('/common/breadcrumps') ?>
<section class="Section Section--white" style="padding-top: 30px">
    <div class="container">
        <div class="text-center">
            <h6><?= MgHelpers::getSettingTypeText('wanna invest 1 header ' . Yii::$app->language, false, 'wanna invest 1 header ') ?></h6>
        </div>
        <div style="margin-bottom: 25px">
            <div class="row">
                <div class="col-lg-6 text-right">
                    <h5><?= MgHelpers::getSettingTypeText('wanna invest 1 box 1 header ' . Yii::$app->language, false, 'wanna invest 1 box 1 header') ?></h5>
                    <?= MgHelpers::getSettingTypeText('wanna invest 1 box 1 text ' . Yii::$app->language, true, '<p>wanna invest 1 box 1 text</p>') ?>
                </div>
                <div class="col-lg-6">
                    <img src="<?= MgHelpers::getSettingTypeText('wanna invest 1 box 1 image ' . Yii::$app->language, false, '/images/img2.jpg') ?>"
                         alt=""/>
                </div>
            </div>
        </div>
        <div style="margin-bottom: 25px">
            <div class="row">
                <div class="col-lg-6">
                    <img src="<?= MgHelpers::getSettingTypeText('wanna invest 1 box 2 image ' . Yii::$app->language, false, '/images/img3.jpg') ?>"
                         alt=""/>
                </div>
                <div class="col-lg-6">
                    <h5><?= MgHelpers::getSettingTypeText('wanna invest 1 box 2 header ' . Yii::$app->language, false, 'wanna invest 1 box 2 header') ?></h5>
                    <?= MgHelpers::getSettingTypeText('wanna invest 1 box 2 text ' . Yii::$app->language, true, '<p>wanna invest 1 box 2 text</p>') ?>

                </div>
            </div>
        </div>
        <h5><?= MgHelpers::getSettingTypeText('wanna invest 2 header ' . Yii::$app->language, false, 'wanna invest 2 header') ?></h5>
        <?= MgHelpers::getSettingTypeText('wanna invest 2 text ' . Yii::$app->language, true, 'wanna invest 2 text') ?>
    </div>
    <div class="container fadeIn animated">
        <div class="text-left">
            <h5><?= MgHelpers::getSettingTypeText('wanna invest 3 header ' . Yii::$app->language, false, 'wanna invest 3 header') ?></h5>
        </div>
        <div class="List-grid List-grid--numbers">
            <div class="List-grid__item">
                <h6 class="List-grid__item__header">
                    <?= MgHelpers::getSettingTypeText('wanna invest 3 box 1 header ' . Yii::$app->language, false, 'wanna invest 3 box 1 header') ?>
                </h6>
                <p class="List-grid__item__content">
                    <?= MgHelpers::getSettingTypeText('wanna invest 3 box 1 text ' . Yii::$app->language, false, 'wanna invest 3 box 1 text') ?>
                </p>
            </div>
            <div class="List-grid__item">
                <h6 class="List-grid__item__header">
                    <?= MgHelpers::getSettingTypeText('wanna invest 3 box 2 header ' . Yii::$app->language, false, 'wanna invest 3 box 2 header') ?>
                </h6>
                <p class="List-grid__item__content">
                    <?= MgHelpers::getSettingTypeText('wanna invest 3 box 2 text ' . Yii::$app->language, false, 'wanna invest 3 box 2 text') ?>
                </p>
            </div>
            <div class="List-grid__item">
                <h6 class="List-grid__item__header">
                    <?= MgHelpers::getSettingTypeText('wanna invest 3 box 3 header ' . Yii::$app->language, false, 'wanna invest 3 box 3 header') ?>
                </h6>
                <p class="List-grid__item__content">
                    <?= MgHelpers::getSettingTypeText('wanna invest 3 box 3 text ' . Yii::$app->language, false, 'wanna invest 3 box 3 text') ?>
                </p>
            </div>
        </div>
    </div>
</section>
<section style="padding-bottom: 100px">
    <div class="container">
        <div class="banner-wrapper">
            <div
                    class="banner"
                    style="background-image: url(<?= MgHelpers::getSettingTypeText('wanna invest 4 image ' . Yii::$app->language, false, '/images/banner_6.jpg') ?>)"
            >
                <div>
                    <?= MgHelpers::getSettingTypeText('wanna invest 4 header ' . Yii::$app->language, false, 'wanna invest 4 header') ?>
                    <?= MgHelpers::getSettingTypeText('wanna invest 4 text ' . Yii::$app->language, true, '<p>wanna invest 4 text</p>') ?>
                    <a class="btn btn-secondary" href="<?= \yii\helpers\Url::to('/project/index') ?>">
                        <?= Yii::t('db', 'See projects') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->render('/common/newsletterForm')?>
