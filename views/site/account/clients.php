<?php
/* @var $this yii\web\View */

/* @var $payments Payment[] */

use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Payment;
use kartik\grid\GridView;

$searchModel = new \app\models\mgcms\db\UserSearch();
$searchParams = ['UserSearch' => ['adviser_id' => MgHelpers::getUserModel()->id]];
$dataProvider = $searchModel->search($searchParams);
?>


<section class="Section Section--big-padding-top Contact fillAccount accountClients">
    <div class="text-center mt-2 mb-2"><a class="btn-primary btn"
                                     href="<?= \yii\helpers\Url::to(['/site/login', 'hash' => MgHelpers::encrypt(['id' => MgHelpers::getUserModel()->id])]) ?>"><?= Yii::t('db', 'Affiliate link') ?></a>
    </div>

    <div class="payment-grid">
        <?php
        $gridColumn = [
            ['class' => 'yii\grid\SerialColumn'],
            'first_name',
            'last_name',
            'created_on',
            'username',
            'phone',
            [
                'attribute' => 'additional_information',
                'label' => Yii::t('db', 'Additional information'),
                'value' => function($model) {
                    return \kartik\select2\Select2::widget([
                        'name' => 'User[additional_information]['.$model->id.']',
                        'value' => $model->additional_information,
                        'data' => MgHelpers::getSettingOptionArray('client status',true),
                        'options' => ['multiple' => false, 'placeholder' => '','class' => 'clientAdditionalInformation']
                    ]);
                },
                'format' => 'raw',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => MgHelpers::getSettingOptionArray('client status',true),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => Yii::t('db', 'Additional information'), 'id' => 'grid-client-search']
            ],
            [
                'attribute' => 'project_id',
                'label' => Yii::t('db', 'Project'),
                'value' => function($model) {
                    return \kartik\select2\Select2::widget([
                        'name' => 'User[project_id]['.$model->id.']',
                        'value' => $model->project_id,
                        'data' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\Project::find()->asArray()->all(), 'id', 'name'),
                        'options' => ['multiple' => false, 'placeholder' => '','class' => 'clientAdditionalInformation']
                    ]);
                },
                'format' => 'raw',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\mgcms\db\Project::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => Yii::t('db', 'Project'), 'id' => 'grid-client-search']
            ],


        ];

        ?>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumn,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-payment']],
            'summary' => false,
            'bordered' => false,
            'options' => ['class' => 'mainTable'],
            'striped' => false,
            // your toolbar can include the additional full export menu
        ]);

        ?>
</section>

<script>
    $('.clientAdditionalInformation').change(function(){
        const matchUserId = $(this).attr("name").match(/\[(\d+)\]/);
        const matchField = $(this).attr("name").match(/\[(\w+)\]/);
        if(matchUserId[1] && matchField[1]){
            let data = {
                userId: matchUserId[1]
            };
            data[matchField[1]] = $(this).val();
            $.ajax('/site/set-client-data',{
                method: 'post',
                data: data,
                success: alert('<?=Yii::t('db','Saved')?>')
            });
        }
    })

</script>
