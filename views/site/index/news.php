<?

use app\components\mgcms\MgHelpers;

$category = \app\models\mgcms\db\Category::findOne(['name' => 'aktualności ' . Yii::$app->language]);
if (!$category) {
    return false;
}

if(count($category->articles) === 0){
    return false;
}


?>

<section
        class="Section Projects Projects--list"
>
    <div class="container">
        <div class="Projects__header__wrapper">
            <h1 class="text-center white"><?= Yii::t('db', 'News') ?></h1>
        </div>
    </div>
    <div class="container">
        <div class="Projects__sortable">
            <? foreach ($category->articles as $index => $article): ?>
                <? if ($index > 3) {
                    break;
                } ?>
            <div class="Projects__card item">
                <?= $this->render('/article/_index', ['model' => $article])?>
            </div>
            <? endforeach ?>


        </div>
    </div>
    <div class="text-center" style="margin-top: 100px;">
        <a href="<?= $category->linkUrl ?>" class="btn btn-secondary"><?= Yii::t('db', 'See all') ?></a>
    </div>
</section>
