<?

use app\components\mgcms\MgHelpers;
use \app\models\mgcms\db\User;

$teamUsers = User::find()->where(['status' => User::STATUS_INACTIVE, 'role' => 'team'])->all();
if (sizeof($teamUsers) == 0) {
    return false;
}

?>

<section class="Section Team" style="padding-bottom: 0">
    <div class="container">
        <h6 class="text-center" style="margin-bottom: 25px"><?= Yii::t('db', 'Team') ?></h6>
        <div class="Team__carousel owl-carousel">
            <? foreach ($teamUsers as $teamUser): ?>
                <div class="item Team__item">
                    <? if ($teamUser->file && $teamUser->file->isImage()): ?>
                        <img class="Team__item__photo" src="<?= $teamUser->file->getImageSrc(160, 160) ?>"/>
                    <? endif ?>
                    <div class="Team__item__name"><?= $teamUser->first_name ?> <?= $teamUser->last_name ?></div>
                    <div><?= $teamUser->getModelAttribute('position') ?></div>
                    <div class="Social-icons Team__item__social-icons">
                        <? if ($teamUser->phone): ?>
                            <a href="tel:<?= $teamUser->phone ?>" class="Social-icons__icon">
                                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                            </a>
                        <? endif ?>
                        <? if ($teamUser->getModelAttribute('facebook')): ?>
                            <a class="Social-icons__icon" href="<?= $teamUser->getModelAttribute('facebook') ?>">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        <? endif ?>

                        <? if ($teamUser->getModelAttribute('linkedin')): ?>
                            <a class="Social-icons__icon" href="<?= $teamUser->getModelAttribute('linkedin') ?>">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                        <? endif ?>
                    </div>
                    <? if ($teamUser->email): ?>
                        <div class="text-center">
                            <a
                                    href="mailto:<?= $teamUser->email ?>"
                                    class="btn btn-secondary btn-secondary-outlined btn-block"
                            ><?= $teamUser->email ?></a
                            >
                        </div>
                    <? endif ?>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</section>

