<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\watchlist\models\WatchlistMovie */

$this->title = 'Update Watchlist Movie: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Watchlist Movies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="watchlist-movie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
