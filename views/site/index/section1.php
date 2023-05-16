<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use app\models\mgcms\db\Setting;


?>

<section class="Section Section--light-background section1hp">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <h3 class="text-center3"><?= MgHelpers::getSettingTypeText('HP - section 1 - 1 header ' . Yii::$app->language, false, 'HP - section 1 - 1 header') ?></h3>
                <img src="<?= MgHelpers::getSettingTypeText('HP - section 1 - 1 image ' . Yii::$app->language, false, '/images/image_2.jpg') ?>"/>
                <div class="text-center">
                    <a class="btn btn-secondary" href="<?= MgHelpers::getSettingTypeText('HP - section 1 - 1 link', false,'#')?>"><?= MgHelpers::getSettingTypeText('HP - section 1 - 1 link label ' . Yii::$app->language,false,'HP - section 1 - 1 link label')?></a>
                </div>
            </div>
            <div class="col-xl-6">
                <h3 class="text-center3"><?= MgHelpers::getSettingTypeText('HP - section 1 - 2 header ' . Yii::$app->language, false, 'HP - section 1 - 2 header') ?></h3>
                <img src="<?= MgHelpers::getSettingTypeText('HP - section 1 - 2 image ' . Yii::$app->language, false, '/images/image_2.jpg') ?>"/>
                <div class="text-center">
                    <a class="btn btn-secondary" href="<?= MgHelpers::getSettingTypeText('HP - section 1 - 2 link', false,'#')?>"><?= MgHelpers::getSettingTypeText('HP - section 1 - 2 link label ' . Yii::$app->language,false,'HP - section 1 - 1 link label')?></a>
                </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-xl-12">
                <img class="w-100"
                     src="<?= MgHelpers::getSettingTypeText('HP - section 2 - image ' . Yii::$app->language, false, '/images/111.jpg') ?>"
                     alt=""/>
            </div>
        </div>
    </div>
</section>
