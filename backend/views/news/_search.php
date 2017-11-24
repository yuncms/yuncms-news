<?php

use yii\helpers\Html;
use xutl\inspinia\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yuncms\news\backend\models\NewsSearch */
/* @var $form ActiveForm */
?>

<div class="news-search pull-right">

    <?php $form = ActiveForm::begin([
        'layout' => 'inline',
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('id'),
        ],
    ]) ?>

    <?= $form->field($model, 'user_id', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('user_id'),
        ],
    ]) ?>

    <?=$form->field($model, 'title', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('title'),
        ],
    ]) ?>

    <?php // echo $form->field($model, 'description') ?>

    <?=$form->field($model, 'status', [
        'inputOptions' => [
            'placeholder' => $model->getAttributeLabel('status'),
        ],
    ]) ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'published_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('news', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('news', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
