<?php

use \yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\mgcms\db\Article */
?>


<? if ($model->file && $model->file->isImage()): ?>
    <div class="Projects__card__image-wrapper">
        <img src="<?= $model->file->getImageSrc(437, 285) ?>" alt="<?= $model->title ?>"/>
    </div>
<? endif; ?>

<div class="Projects__card__header">
    <div class="Projects__card__heading">
        <?= $model->title ?>
    </div>
</div>
<div class="Projects__card__body">
    <p class="Project__card__body__text">
        <?= $model->excerpt ?>
    </p>
</div>
<div class="Projects__card__footer">
    <a href="<?= $model->linkUrl ?>"
       class="btn btn-secondary btn-secondary-outlined"><?= Yii::t('db', 'Read more') ?></a>
    <div class="Projects__date">
        <?= $model->created_on ?>
    </div>
</div>

