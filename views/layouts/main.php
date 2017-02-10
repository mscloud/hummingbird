<?php

use app\assets\AppAsset;
use dmstr\helpers\AdminLteHelper;
use dmstr\web\AdminLteAsset;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $content string */

if (in_array(\Yii::$app->controller->action->id, ['login', 'reset-password'])) {
    /**
     * Do not use this code in your template. Remove it. 
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
    echo $this->render(
        'main-login', ['content' => $content]
    );
} else {

    AppAsset::register($this);
    AdminLteAsset::register($this);

    $directoryAsset = \Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= \Yii::$app->language ?>">
        <head>
            <meta charset="<?= \Yii::$app->charset ?>"/>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <?= Html::csrfMetaTags() ?>
            <title><?= Html::encode($this->title) ?></title>
            <?php $this->head() ?>
        </head>
        <body class="hold-transition sidebar-mini <?= AdminLteHelper::skinClass() ?>">
            <?php $this->beginBody() ?>
            <div class="wrapper">

                <?=
                $this->render(
                    'header.php', ['directoryAsset' => $directoryAsset]
                )
                ?>

                <?= $this->render('left.php') ?>

                <?=
                $this->render(
                    'content.php', ['content' => $content, 'directoryAsset' => $directoryAsset]
                )
                ?>

            </div>

            <?php $this->endBody() ?>
        </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
