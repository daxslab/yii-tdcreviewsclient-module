<?php
/**
 * Created by WebStorm.
 * User: glpz
 * Date: 25/06/17
 * Time: 17:50
 */
use daxslab\tdcreviewsclient\models\ReviewData;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var Place $place */
/** @var ReviewData $review */
?>

<?php $form = ActiveForm::begin([
    'method' => 'post',
]) ?>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'name')->textInput() ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'email')->textInput() ?>
    </div>
</div>

<?= $form->field($model, 'rating')->textInput(['type' => 'range', 'min' => 0, 'max' => '5']) ?>

<?= $form->field($model, 'comment')->textarea(['rows' => 5]) ?>

<?= $form->field($model, 'like') ?>

<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-success btn-block']) ?>
</div>

<?php ActiveForm::end() ?>


