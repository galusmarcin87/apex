<?php

/* @var $model app\models\mgcms\db\Project */

/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use yii\helpers\Url;

if (count($model->files) == 0) {
    return false;
}
?>


<div class="Project__info">
    <div class="Project__gallery__photo">
        <img
                src="<?= $model->files[0]->getImageSrc(685, 424) ?>"
                class="Project__photo"
        />
        <a href="<?= $model->files[0]->getImageSrc() ?>" class="zoom"></a>
    </div>
    <div class="Project__slider">
        <div class="owl-carousel Gallery__wrapper">
            <? foreach ($model->files as $file): ?>
                <? if ($file->isImage()):?>
                    <div class="col-sm-4">
                        <a
                                href="<?= $file->getImageSrc() ?>"
                                style="
                                        background-image: url(<?= $file->getImageSrc(200, 140) ?>);
                                        "
                                class="item"
                        ></a>
                    </div>
                <? endif; ?>
            <? endforeach; ?>

        </div>
    </div>
</div>
