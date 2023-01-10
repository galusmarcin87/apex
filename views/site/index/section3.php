<?
/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\web\View;
use app\models\mgcms\db\Setting;


?>
<section class="Section Section--white">
    <div class="container">
        <div class="grid columns-2">
            <img class="img-cover"
                 src="<?= MgHelpers::getSettingTypeText('HP - section 3 - image ' . Yii::$app->language, false, '/images/Depositphotos_240777230_xl-2015.jpg') ?>"
                 alt=""/>
            <div class="Highlight-box">
                <div class="Highlight-box__header">
                    <?= MgHelpers::getSettingTypeText('HP - section 3 - header 1' . Yii::$app->language, false, 'HP - section 3 - header 1') ?>
                    <span>
                        <?= MgHelpers::getSettingTypeText('HP - section 3 - header 2' . Yii::$app->language, false, 'HP - section 3 - header 2') ?>
                 </span>
                </div>
                <?= MgHelpers::getSettingTypeText('HP - section 3 - text' . Yii::$app->language, false, 'HP - section 3 - text') ?>

            </div>
        </div>
    </div>
</section>
