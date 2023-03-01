<?php
/* @var $project app\models\mgcms\db\Project */

/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

/* @var $payment app\models\mgcms\db\Payment */
/* @var $form app\components\mgcms\yii\ActiveForm */
$this->title = Yii::t('db', 'Invest');

?>

<?= $this->render('/common/breadcrumps') ?>

<section class="Section Project">
    <div class="container">
        <h1 class="text-center"><?= Yii::t('db', 'Invest') ?></h1>
        <div class="Project__content">
            <div class="col-md-6">
                <h4><?= $project->name ?></h4>
                <table>
                    <tr>
                        <th><?= Yii::t('db', 'Return on investment') ?> </th>
                        <td><?= $project->percentage ?>%</td>
                    </tr>
                    <tr>
                        <th><?= Yii::t('db', 'Money gathered') ?></th>
                        <td><?= $project->money ?>$</td>
                    </tr>
                    <tr>
                        <th><?= Yii::t('db', 'Goal') ?></th>
                        <td><?= $project->money_full ?>$</td>
                    </tr>
                    <tr>
                        <th><?= Yii::t('db', 'Time left') ?></th>
                        <td><?= MgHelpers::dateDifference($project->date_crowdsale_end, date("Y-m-d H:i:s"),Yii::t('db','%a days, %h hours'))  ?></td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</section>


<section class="Section Section--big-padding-top Contact fillAccount">
    <div class="container">
        <h1 class="text-center"><?= Yii::t('db', 'Invest'); ?></h1>
        <div class="Contact__grid">
            <?php
            $form = ActiveForm::begin([
                'id' => 'login-form',
            ]);

            ?>


            <div class="col-md-4 offset-5">
                <label class="Contact-form__label field-user-first_name">
                    <div class="Contact-form__label" style="display: none">
                        <?= Yii::t('db', 'Tokens to invest'); ?>
                        <input type="text" id="tokensToInvest"
                               class="Contact-form__input form-control"
                               name="tokensToInvest"
                               placeholder=" ">

                        <p class="help-block help-block-error"></p>
                    </div>
                    <div class="Contact-form__label">
                        <?= Yii::t('db', 'Enter amount you want to invest'); ?>
                        <input type="text" id="plnToInvest"
                               class="Contact-form__input form-control"
                               name="plnToInvest"
                               placeholder=" ">

                        <p class="help-block help-block-error"></p>
                    </div>
                </label>

                <input
                        type="submit"
                        class="button"
                        value="<?= Yii::t('db', 'Next'); ?>"
                />
            </div>


            <br/>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>


<script>
    $(document).ready(function () {
        var tokenRate = <?=MgHelpers::getSetting('token rate', false, 2)?>;
        $('#tokensToInvest').on('input', function () {
            $('#plnToInvest').val($(this).val() * tokenRate);
        });
    });
</script>
