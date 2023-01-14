<?

use app\widgets\NobleMenu;
use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use yii\bootstrap\ActiveForm;

$menu = new NobleMenu(['name' => 'footer_' . Yii::$app->language, 'loginLink' => false]);
$menu2 = new NobleMenu(['name' => 'footer2_' . Yii::$app->language, 'loginLink' => false]);

?>

<footer>
    <div class="Footer" style="background-image: url(/images/Depositphotos_59695353_XL.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="/images/logo_APEX_poziome.png" />
                    <div class="Footer__desc">
                        <?= MgHelpers::getSetting('footer about us text' . Yii::$app->language, false, 'footer about us text') ?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="Footer__item"><?= Yii::t('db', 'Menu') ?></div>
                    <ul class="Footer__menu">
                        <? foreach ($menu->getItems() as $item): ?>
                            <li class="Footer__menu__item">
                                <? if (isset($item['url'])): ?>
                                    <a href="<?= \yii\helpers\Url::to($item['url']) ?>"
                                       class="Footer__menu__link <? if (isset($item['active']) && $item['active']): ?>Footer__menu__link--active<? endif ?>"><?= $item['label'] ?></a>
                                <? endif ?>
                            </li>
                        <? endforeach ?>

                    </ul>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="Footer__item">
                        <?= Yii::t('db', 'Menu') ?>
                    </div>
                    <ul class="Footer__menu">
                        <? foreach ($menu2->getItems() as $item): ?>
                            <li class="Footer__menu__item">
                                <? if (isset($item['url'])): ?>
                                    <a href="<?= \yii\helpers\Url::to($item['url']) ?>"
                                       class="Footer__menu__link <? if (isset($item['active']) && $item['active']): ?>Footer__menu__link--active<? endif ?>"><?= $item['label'] ?></a>
                                <? endif ?>
                            </li>
                        <? endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="Footer__top">
                <div class="row">
                    <div class="col-md-3">
                        <?= Yii::t('db', 'Phone'); ?>
                        <? $phone = MgHelpers::getSetting('footer phone', false, '+22 900 121 212') ?>
                        <a class="Footer__top__desc" href="tel:<?= str_replace(' ', '', $phone) ?>">
                            <?= $phone ?>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <?= Yii::t('db', 'Email'); ?>
                        <? $email = MgHelpers::getSetting('footer email', false, 'biuro@apex.pl') ?>
                        <a class="Footer__top__desc" href="mailto:<?= $email ?>">
                            <?= $email ?>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <?= Yii::t('db', 'Address'); ?>
                        <div class="Footer__top__desc">
                            <?= MgHelpers::getSetting('footer address', false, 'ul. Nazwaulicy 22/A1 <br />
                  00-222 Warszawa') ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <?= Yii::t('db', 'Social media'); ?>
                        <div class="Footer__top__desc">
                            <div class="Social-icons">
                                <? if (MgHelpers::getSetting('facebook url')): ?>
                                    <a href="<?= MgHelpers::getSetting('facebook url') ?>" target="_blank"
                                       class="Social-icons__icon">
                                        <i class="Menu-top__icon fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                <? endif ?>
                                <? if (MgHelpers::getSetting('youtube url')): ?>
                                    <a href="<?= MgHelpers::getSetting('youtube url') ?>" target="_blank"
                                       class="Social-icons__icon">
                                        <i class="Menu-top__icon fa fa-youtube" aria-hidden="true"></i>
                                    </a>
                                <? endif ?>
                                <? if (MgHelpers::getSetting('twitter url')): ?>
                                    <a href="<?= MgHelpers::getSetting('twitter url') ?>" target="_blank"
                                       class="Social-icons__icon">
                                        <i class="Menu-top__icon fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                <? endif ?>
                                <? if (MgHelpers::getSetting('linkedin url')): ?>
                                    <a href="<?= MgHelpers::getSetting('linkedin url') ?>" target="_blank"
                                       class="Social-icons__icon">
                                        <i class="Menu-top__icon fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                <? endif ?>
                                <? if (MgHelpers::getSetting('instagram url')): ?>
                                    <a href="<?= MgHelpers::getSetting('instagram url') ?>" target="_blank"
                                       class="Social-icons__icon">
                                        <img
                                                class="Social-icons__icon__img"
                                                src="/svg/instagram.svg"
                                                alt=""
                                        />
                                    </a>
                                <? endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6" style="padding-left: 0;">
                            <p><?= MgHelpers::getSettingTranslated('footer copyright',  '&#169; 2022 Wszelkie prawa zastzeżone - APEX') ?></p>
                        </div>
                        <div class="col-md-6 text-right" style="padding-right: 0;">
                            <p>
                                <?= Yii::t('db', 'Realisation') ?>:
                                <a
                                        class="Footer__link"
                                        target="_blank"
                                        href="https://www.vertesdesign.pl/"
                                >Vertes Desing</a
                                >
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
