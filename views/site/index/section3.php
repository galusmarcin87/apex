<?

use app\components\mgcms\MgHelpers;

if (MgHelpers::getSetting('home - zaplecze instytucjonalne obrazki') == '') {
    return false;
}

?>

<section class="Section Partners pb-0">
    <div class="container">
        <h1 class="text-center goldenText mb-0"><?= Yii::t('db', 'INSTITUTIONAL FACILITIES'); ?></h1>
        <div class="Partners__carousel owl-carousel">
            <? foreach (MgHelpers::getSettingsArray('home - zaplecze instytucjonalne obrazki', false) as $fileUrl): ?>
                <div class="item Partners__item">
                    <a class="Partners__item__link" href="#">
                        <img src="<?= $fileUrl ?>" class="Partners__item__link__logo"/>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</section>

