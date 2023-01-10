<?

use app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Project;
use yii\web\View;

/* @var $model Project */
/* @var $this yii\web\View */
$model->language = Yii::$app->language;
?>


<div class="Project__return">
                  <span>
                    <img
                            src="/images/zwrot.png"
                            alt=""
                    />
                  </span>
    <span>
                    <strong><?= $model->percentage ?>% <?= Yii::t('db', 'return') ?></strong>
                  </span>
</div>
<div class="Projects__card__image-wrapper">
    <? if ($model->file && $model->file->isImage()): ?>
        <img src="<?= $model->file->getImageSrc(437, 285); ?>" alt=""/>
    <? endif; ?>

    <a href="<?= $model->linkUrl ?>" class="btn btn-secondary">        <?= Yii::t('db', 'Investition details') ?>    </a>
</div>
<div class="Projects__card__header">
    <a href="<?= $model->linkUrl ?>" class="Projects__card__heading">
        <?= $model->name ?>
    </a>
</div>
<div class="Projects__card__body">
    <p class="Projects__card__text">
        <?= $model->lead ?>
    </p>
    <ul class="List-custom__two grid">
        <li class="List-custom__two__item">
                  <span>
                    <img
                            class="List-custom__two_ico"
                            src="/images/lokalizacja.png"
                            alt=""
                    />
                  </span>
            <span>
                    <strong><?= $model->localization ?></strong>
                  </span>
        </li>
        <li class="List-custom__two__item">
                  <span>
                    <img
                            class="List-custom__two_ico"
                            src="/images/kalendarz.png"
                            alt=""
                    />
                  </span>
            <span>
                    <strong><?= $model->investition_time ?> <?= Yii::t('db', 'years') ?></strong>
                  </span>
        </li>
    </ul>

    <?= $this->render('_counterMoney', ['model' => $model]) ?>
    <?= $this->render('_counterTimer', ['model' => $model]) ?>
</div>
