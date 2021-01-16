<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\watchlist\models\WatchlistMovie */

$this->title = 'Create Watchlist Movie';
$this->params['breadcrumbs'][] = ['label' => 'Watchlist Movies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="watchlist-movie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
