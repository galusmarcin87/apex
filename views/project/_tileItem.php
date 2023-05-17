<?

use app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Project;
use yii\web\View;

/* @var $model Project */
/* @var $this yii\web\View */
$model->language = Yii::$app->language;
?>


<div class="Projects__card__image-wrapper">
    <? if ($model->file && $model->file->isImage()): ?>
        <img src="<?= $model->file->getImageSrc(437, 285); ?>" alt=""/>
    <? endif; ?>

    <a href="<?= $model->linkUrl ?>"
       class="btn btn-secondary">        <?= Yii::t('db', 'Investition details') ?>    </a>
</div>

<? if ($model->type == Project::TYPE_BUSINESS_OWNER): ?>
    <h4 class="pt-2 pb-2 goldenText text-center violetBg"> <?= $model->value ?></h4>
<? endif; ?>

<div class="Projects__card__body">
    <p class="text-center">
        <?= $model->name ?>
    </p>
    <p class="Projects__card__text">
        <?= $model->lead ?>
    </p>
</div>
