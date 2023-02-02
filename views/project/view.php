<?php
/* @var $model app\models\mgcms\db\Project */
/* @var $form app\components\mgcms\yii\ActiveForm */

/* @var $this yii\web\View */

/* @var $subscribeForm \app\models\SubscribeForm */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


$this->title = $model->name;
$model->language = Yii::$app->language;
if (!$model->money_full) {
    return false;
}
$index = 0;
?>

<?= $this->render('/common/breadcrumps') ?>

<section class="Section Project">
    <div class="container">
        <h1 class="text-center"><?= $model->name ?></h1>
        <div class="Project__content">
            <?= $this->render('view/gallery', ['model' => $model]) ?>
            <div class="Project__info__content">
                <div class="Project__info__return">
                    <div>
                        <div class="Project__return">
                            <img src="/images/zwrot.png" alt=""/>
                            <?= $model->percentage ?>% <?= Yii::t('db', 'return') ?>
                        </div>
                    </div>
                    <div>
                        <img
                                class="List-custom__two_ico"
                                src="/images/lokalizacja.png"
                                alt=""
                        />
                        <strong><?= $model->localization ?></strong>
                    </div>
                    <div>
                        <img
                                class="List-custom__two_ico"
                                src="/images/kalendarz.png"
                                alt=""
                        />
                        <strong><?= $model->investition_time ?> <?= Yii::t('db', 'years') ?></strong>
                    </div>
                </div>
                <?= $this->render('view/table', ['model' => $model]) ?>



                <?= $this->render('_counterTimer', ['model' => $model]) ?>

                <?= $this->render('_counterMoney', ['model' => $model]) ?>

            </div>
        </div>
        <?= $model->text ?>
        <div class="Project__content">
            <div class="Project__map" id="map"></div>
            <div>
                <h6 style="margin-bottom: 20px"><?= Yii::t('db', 'Files to download') ?></h6>
                <? foreach ($model->fileRelations as $fileRelation): ?>
                    <? if ($fileRelation->json != '1' || !$fileRelation->file) continue ?>
                    <a class="Project__file" href="<?= $fileRelation->file->linkUrl ?>" target="_blank">

                        <div class="Project__file__ico">
                            <img src="/svg/pdf.svg" alt=""/>
                        </div>
                        <?= $fileRelation->file->origin_name ?>
                    </a>
                <? endforeach; ?>
            </div>
        </div>
        <?= $this->render('view/bonuses', ['model' => $model]) ?>

        <div class="container">
            <div class="Project__banner">
                <img src="/images/banner_3.jpg"/>
                <a class="btn btn-secondary"
                   href="<?= Url::to(['project/buy', 'id' => $model->id]) ?>"><?= Yii::t('db', 'iNVEST') ?></a>
            </div>
            <div class="White-text-block">
                <div>
                    <h5 class="White-text-block__header"><?= Yii::t('db', 'Any <br/> questions?') ?></h5>
                </div>
                <div class="flex">
                    <div class="White-text-block__image">
                        <img src="<?= MgHelpers::getSettingTypeText('projekt pytania obrazek', false, '/images/tamara-bellis.png') ?>"/>
                    </div>
                    <div>
                        <div class="White-text-block__subheader">
                            <?= MgHelpers::getSettingTypeText('projekt pytania imie i nazwisko', false, 'projekt pytania imie i nazwisko') ?>
                        </div>
                        <div class="White-text-block__role">
                            <?= MgHelpers::getSettingTypeText('projekt pytania podpis', false, 'projekt pytania podpis') ?>
                        </div>
                        <div class="White-text-block__desc">
                            <? $phone = MgHelpers::getSettingTypeText('projekt pytania telefon', false, 'projekt pytania telefon') ?>
                            <? $mail = MgHelpers::getSettingTypeText('projekt pytania mail', false, 'projekt pytania mail') ?>
                            <a href="tel:<?= $phone ?>"><?= $phone ?></a>
                            <br/>
                            <a href=" mailto:<?= $mail ?>"
                            ><?= $mail ?></a
                            >
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <div class="White-text-block__image">
                        <img src="<?= MgHelpers::getSettingTypeText('projekt pytania obrazek 2', false, '/images/tamara-bellis.png') ?>"/>
                    </div>
                    <div>
                        <div class="White-text-block__subheader">
                            <?= MgHelpers::getSettingTypeText('projekt pytania imie i nazwisko 2', false, 'projekt pytania imie i nazwisko 2') ?>
                        </div>
                        <div class="White-text-block__role">
                            <?= MgHelpers::getSettingTypeText('projekt pytania podpis 2', false, 'projekt pytania podpis 2') ?>
                        </div>
                        <div class="White-text-block__desc">
                            <? $phone = MgHelpers::getSettingTypeText('projekt pytania telefon 2', false, 'projekt pytania telefon 2') ?>
                            <? $mail = MgHelpers::getSettingTypeText('projekt pytania mail 2', false, 'projekt pytania mail 2') ?>
                            <a href="tel:<?= $phone ?>"><?= $phone ?></a>
                            <br/>
                            <a href=" mailto:<?= $mail ?>"
                            ><?= $mail ?></a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->render('view/script', ['model' => $model])?>

<section
        class="Section Projects Section--light-background"
        style="padding-bottom: 60px; padding-top: 60px"
>
    <div class="container fadeIn animated">
        <h6 class="text-center"><?= Yii::t('db', 'See also') ?></h6>
        <?= $this->render('/common/projects') ?>
    </div>
</section>


<?= $this->render('/common/newsletterForm') ?>
