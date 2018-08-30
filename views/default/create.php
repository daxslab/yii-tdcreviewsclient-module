<?php
/**
 * Created by WebStorm.
 * User: glpz
 * Date: 24/09/17
 * Time: 18:33
 */

$this->title = Yii::t('app', 'Write a review for {website}', ['website' => Yii::$app->name]);

?>

<section id="site-reviews">

    <header class="jumbotron" style="background-image: url(../images/mosaicos-en-marilope-hostal.jpg) ">
        <div class="overlay">
            <div class="container">
                <h1><?= $this->title ?></h1>
            </div>
        </div>
    </header>

    <div class="light">

        <div class="container">

            <?php if (Yii::$app->session->hasFlash('send-review-error')): ?>
                <div class="alert alert-danger">
                    <strong><?= Yii::t('app', 'Sorry!') ?></strong> <?= Yii::$app->session->getFlash('send-review-error') ?>
                </div>
            <?php endif; ?>

            <?= $this->render('_form', [
                'model' => $model
            ]) ?>
        </div>

    </div>

</section>




