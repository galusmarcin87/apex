<?

use app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Project;
use yii\web\View;

/* @var $model Project */
/* @var $this yii\web\View */
$model->language = Yii::$app->language;
if(!$model->money_full){
    return false;
}
?>


<div class="Invest-counter">
    <div class="Invest-counter__header">
        <div class="Invest-counter__source">
                        <span class="Invest-counter__source__value"
                        ><?= $model->money ?> PLN</span
                        >
            (<span
                    data-to="<?= round(($model->money / $model->money_full) * 100, 3) ?>"
                    class="Invest-counter__source__percent"
            >0</span
            >%)
        </div>
        <div class="Invest-counter__target">
            cel: <?= MgHelpers::convertNumberToNiceString($model->money_full) ?> PLN
        </div>
    </div>
    <div class="Invest-counter__value-line-wrapper">
        <div
                data-to="<?= $model->money ?>"
                data-slide-to="<?= round(($model->money / $model->money_full) * 100, 3) ?>"
                class="Invest-counter__value-line"
                style="width: 0%"
        ></div>
    </div>
</div>
