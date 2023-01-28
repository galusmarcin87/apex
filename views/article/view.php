<?php

use yii\web\View;

/* @var $this yii\web\View */
/* @var $model \app\models\mgcms\db\Article */
$this->registerLinkTag(['rel' => 'canonical', 'href' => \yii\helpers\Url::canonical()]);
$categoryName = false;
if ($model->category) {
    $categoryName = str_contains($model->category->name, 'aktualności') ? Yii::t('db', 'News') : $model->name;
}

$this->params['breadcrumbs'][] = $model->title;

?>

<?= $this->render('/common/breadcrumps') ?>

<section class="Section News News--single">
    <div class="container">
        <div class="text-center">
            <h6><?= $categoryName ?></h6>
            <? if ($model->file && $model->file->isImage()): ?>
                <img class="Card__image" src="<?= $model->file->getImageSrc() ?>"/>
            <? endif ?>
        </div>
        <div class="Card">
            <div class="Card__header__wrapper">
                <div class="Card__date"><?= $model->created_on ?></div>
                <h1 class="Card__header"><?= $model->title ?></h1>
            </div>
            <div class="Card__body">
                <?= $model->content ?>
            </div>
        </div>
    </div>
</section>


<section
        class="Section Projects Projects--list Projects--lightBg"
        style="padding-bottom: 50px; padding-top: 0;"
>
    <div class="container">
        <div class="Projects__header__wrapper">
            <h6 class="text-center"><?= Yii::t('db', 'Read more') ?></h6>
        </div>
    </div>
    <?= $this->render('/common/news',['showWrapper' => false])?>
</section>

<?= $this->render('/common/newsletterForm')?>
