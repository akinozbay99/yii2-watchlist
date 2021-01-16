<?php

use xedeer\watchlist\models\Watchlist;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\watchlist\models\WatchlistMovie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="watchlist-movie-form">

    <?php
    if (!$is_delete) {
        $form = ActiveForm::begin([
            'method' => 'posts',
            'action' => Url::toRoute(['/watchlist/watchlist-movie/create'])
        ]);
    } else {
        $form = ActiveForm::begin([
            'method' => 'posts',
            'action' => Url::toRoute(['/watchlist/watchlist-movie/batch-delete'])
        ]);
    } ?>

    <?= $form->field($model, 'movie_id')->hiddenInput(['value' => $movie_id])->label(false) ?>
    <?php $user_id = Yii::$app->user->id; ?>
    <?= $form->field(new Watchlist(), "id")
        ->dropDownList(ArrayHelper::map(Watchlist::find()->andWhere("user_id=$user_id")
            ->andWhere("id " . ($is_delete ? "" : "NOT") . " IN (SELECT watchlist_id FROM watchlist_movie WHERE movie_id=$movie_id)")->all(), "id", "name"), [
            'multiple' => 'multiple'
        ])->label($is_delete ? "Delete From Watchlist" : "Add To Watchlist"); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>