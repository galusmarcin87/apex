<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use app\models\mgcms\db\Setting;


?>
<section class="Section Section--white" style="padding-bottom: 0;">
    <div class="container">
        <img src="<?= MgHelpers::getSettingTypeText('HP - section 4 - image ' . Yii::$app->language, false, '/images/image_1.png') ?>" />
        <div class="row">
            <div class="text-center">
                <div class="col-lg-6 offset-lg-3">
                    <h1 style="margin-bottom: 40px; margin-top: 50px;">
                        <?= MgHelpers::getSettingTypeText('HP - section 4 - header ' . Yii::$app->language, false, 'HP - section 4 - header') ?>
                    </h1>
                    <?= MgHelpers::getSettingTypeText('HP - section 4 - text ' . Yii::$app->language, true, 'HP - section 4 - text') ?>
                    <a href="<?= MgHelpers::getSettingTypeText('HP - section 4 - link ' . Yii::$app->language, false, '#') ?>"
                       class="btn btn-secondary">
                        <?= MgHelpers::getSettingTypeText('HP - section 4 - link text' . Yii::$app->language, false, 'See more') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
