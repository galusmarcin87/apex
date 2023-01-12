<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use app\components\mgcms\MgHelpers;
use app\models\mgcms\db\Project;

?>
<?= $this->render('index/slider') ?>

<?= $this->render('index/section1') ?>

<section
        class="Section Projects"
        style="padding-bottom: 75px"
>
    <div class="container">
        <div class="Projects__header__wrapper">

            <h4 class="Projects__header text-center"><?= Yii::t('db', 'Business lines of Apex') ?></h4>
        </div>
        <?= $this->render('/common/projects') ?>
        <div class="text-center" style="margin-top: 100px;">
            <a href="<?= \yii\helpers\Url::to('project') ?>" class="btn btn-secondary"> <?= Yii::t('db', 'See all') ?></a>
        </div>
    </div>
</section>

<?= $this->render('index/section2') ?>

<?= $this->render('index/section3') ?>

<?= $this->render('index/news') ?>

<?= $this->render('index/faq') ?>

<?= $this->render('/common/cooperateWith') ?>

<?= $this->render('/common/newsletterForm') ?>
