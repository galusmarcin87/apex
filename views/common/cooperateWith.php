<?

use app\components\mgcms\MgHelpers;

if (MgHelpers::getSetting('home - partnerzy obrazki') == '') {
    return false;
}

?>

<section class="Section Partners">
    <div class="container">
        <h1 class="text-center"><?= Yii::t('db', 'Partners'); ?></h1>
        <div class="Partners__carousel owl-carousel">
            <? foreach (MgHelpers::getSettingsArray('home - partnerzy obrazki',false) as $fileUrl): ?>
                <div class="item Partners__item">
                    <a class="Partners__item__link" href="#">
                        <img src="<?=$fileUrl?>" class="Partners__item__link__logo"/>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</section>

