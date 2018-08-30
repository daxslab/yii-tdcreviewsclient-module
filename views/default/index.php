<?php
/**
 * Created by WebStorm.
 * User: glpz
 * Date: 2/07/17
 * Time: 16:31
 */

use yii\helpers\Html;

$this->title = Yii::t('app', 'Reviews left at {website}', ['website' => Yii::$app->name]);

?>

<article id="site-reviews">

    <header class="jumbotron" style="background-image: url(../images/mosaicos-en-marilope-hostal.jpg) ">
        <div class="header-overlay">
            <div class="container">
                <h1><?= $this->title ?></h1>
            </div>
        </div>
    </header>

    <div class="light">

        <div class="container text-center">

            <?php if (Yii::$app->session->hasFlash('send-review-success')): ?>
                <div class="alert alert-success">
                    <strong><?= Yii::t('app', 'Success!') ?></strong> <?= Yii::$app->session->getFlash('send-review-success') ?>
                </div>
            <?php else: ?>
                <p class="text-center">
                    <?= Html::a(Yii::t('app', 'Write a review'), ['/reviews/default/create'], ['class' => 'btn btn-primary btn-lg']) ?>
                </p>
                <hr>
            <?php endif; ?>

            <?= yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "{items}{pager}",
                'itemView' => '_view',
            ]) ?>
        </div>

    </div>

</article>


