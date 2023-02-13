<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use app\models\mgcms\db\Setting;


?>

<section class="Section Section--light-background">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="uppercase-header">
                    <?= MgHelpers::getSettingTypeText('HP - section 1 - 1 header ' . Yii::$app->language, false, 'HP - section 1 - 1 header') ?>
                </div>
                <h3 style="margin-bottom: 0;"><?= MgHelpers::getSettingTypeText('HP - section 1 - 2 header ' . Yii::$app->language, false, 'HP - section 1 - 2 header') ?></h3>
            </div>
            <div class="col-xl-6">
                <img class="float-image" src="<?= MgHelpers::getSettingTypeText('HP - section 1 - image ' . Yii::$app->language, false, '/images/image_2.jpg') ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <div class="white-box">
                    <?= MgHelpers::getSettingTypeText('HP - section 1 - text ' . Yii::$app->language, true, 'HP - section 1 - text ') ?>
                    <br/>
                    <a href="<?= MgHelpers::getSettingTypeText('HP - section 1 - link ' . Yii::$app->language, false, '#') ?>" class="btn btn-secondary"><?= Yii::t('db', 'Find out more') ?></a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
