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
                    <? if ($article->file && $article->file->isImage()): ?>
                        <div class="Projects__card__image-wrapper">
                            <img src="<?= $article->file->getImageSrc(437, 285) ?>" alt="<?= $article->title ?>"/>
                        </div>
                    <? endif; ?>

                    <div class="Projects__card__header">
                        <div class="Projects__card__heading">
                            <?= $article->title ?>
                        </div>
                    </div>
                    <div class="Projects__card__body">
                        <p class="Project__card__body__text">
                            <?= $article->excerpt ?>
                        </p>
                    </div>
                    <div class="Projects__card__footer">
                        <a href="<?= $article->linkUrl ?>" class="btn btn-secondary btn-secondary-outlined"><?= Yii::t('db', 'Read more') ?></a>
                        <div class="Projects__date">
                            <?= $article->created_on ?>
                        </div>
                    </div>
                </div>

            <? endforeach ?>


        </div>
    </div>
    <div class="text-center" style="margin-top: 100px;">
        <a href="<?= $category->linkUrl ?>" class="btn btn-secondary"><?= Yii::t('db', 'See all') ?></a>
    </div>
</section>
