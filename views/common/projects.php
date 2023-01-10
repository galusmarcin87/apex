<?

/* @var $this yii\web\View */

use app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Project;
use yii\web\View;
use yii\widgets\ListView;

$projectSearch = new \app\models\mgcms\db\ProjectSearch();
$projectSearch->limit = 6;


$tabsStatuses = [Project::STATUS_ACTIVE];
$tabsConfig = [];
foreach ($tabsStatuses as $status) {
    $provider = $projectSearch->search([], $status);
    $provider->pagination = false;
    $provider->sort->defaultOrder = [
        'order' => SORT_ASC,
    ];


    $tabsConfig[] = [
        'name' => Project::STATUSES_EN[$status],
        'provider' => $provider
    ];
}

?>

<?php

$provider = $projectSearch->search([], [Project::STATUS_ACTIVE]);
$provider->pagination = false;
$provider->sort->defaultOrder = [
    'order' => SORT_ASC,
];
$provider->query->limit(6);
echo ListView::widget([
    'dataProvider' => $provider,
    'options' => ['class' => 'Projects__sortable'],
    'itemOptions' => ['class' => 'Projects__card item'],
    'emptyTextOptions' => ['class' => 'col-md-12'],
    'layout' => '{items}',
    'itemView' => function ($model, $key, $index, $widget) {
        return $this->render('/project/_tileItem',
            [
                'model' => $model,
                'key' => $key,
                'index' => $index,
                'widget' => $widget,
                'view' => $this,
            ]);
    },
]);


?>



