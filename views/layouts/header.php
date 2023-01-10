<?

use app\widgets\NobleMenu;
use yii\helpers\Html;
use \app\components\mgcms\MgHelpers;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */

$isHomePage = $this->context->id == 'site' && $this->context->action->id == 'index';

$menu = new NobleMenu(['name' => 'header_' . Yii::$app->language, 'loginLink' => false]);

?>

<div class="Menu-top-wrapper">
    <div id="nav-container" class="Menu-top">
        <div class="container">
            <div class="Menu-top__inner">
                <div>
                    <a href="/">
                        <img src="/images/logo_APEX_poziome.png" alt="" />
                    </a>
                </div>
                <div class="Menu-top__elements">
                    <ul class="Menu-top__list">
                        <? foreach ($menu->getItems() as $item): ?>
                            <li>
                                <? if (isset($item['url'])): ?>
                                    <a href="<?= \yii\helpers\Url::to($item['url']) ?>" class="Menu-top__link   <? if (isset($item['active']) && $item['active']): ?>Menu-top__link--active<?endif;?>"
                                    ><?= $item['label'] ?></a>
                                <? endif ?>
                            </li>
                        <? endforeach ?>
                    </ul>

                    <? if (Yii::$app->user->isGuest): ?>
                        <a href="<?= yii\helpers\Url::to(['/site/login']) ?>" class="btn btn--transparent login"
                        > <?= Yii::t('db', 'Login'); ?> </a>
                        <a href="<?= yii\helpers\Url::to(['/site/register']) ?>" class="btn btn--transparent"
                        > <?= Yii::t('db', 'Register'); ?> </a>
                    <? else: ?>
                        <a href="<?= yii\helpers\Url::to(['/site/account']) ?>" class="btn btn--transparent"
                        > <?= Yii::t('db', 'My account'); ?> </a>
                        <a href="javascript:submitLogoutForm()" class="btn btn--transparent"
                        "> <?= Yii::t('db', 'Log out'); ?> </a>
                    <? endif; ?>

                    <li class="nav-item dropdown languageSwitcher">
                        <a class="nav-link dropdown-toggle" href="#" id="languageSwitcher" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= strtoupper(Yii::$app->language) ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="languageSwitcher">
                            <? foreach (Yii::$app->params['languagesDisplay'] as $language) : ?>
                                <a class="dropdown-item" href="<?= yii\helpers\Url::to(['/', 'language' => $language]) ?>"><?= strtoupper($language) ?></a>
                            <? endforeach ?>
                        </div>
                    </li>


                    <a href="#" class="Menu-top__toggle-btn">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



<?= Html::beginForm(['/site/logout'], 'post', ['id' => 'logoutForm']) ?>
<?= Html::endForm() ?>
<script type="text/javascript">
  function submitLogoutForm () {
    $('#logoutForm').submit();
  }
</script>




