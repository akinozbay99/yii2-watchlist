<?php

use yii\helpers\Html;
use xedeer\watchlist\models\WatchlistMovieSearch;

/* @var $this yii\web\View */
/* @var $model frontend\modules\watchlist\models\Watchlist */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Watchlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="watchlist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php /* DetailView::widget([
        'model' => $model->getWatchlistMovies(),
        'attributes' => [
            'id',
        ],
    ]) */ ?>
    <?php
    $searchModel = new WatchlistMovieSearch();
    $dataProvider = $searchModel->search([
        "watchlist_id" => $model->id
    ]);

    echo $this->render('@vendor/xedeer/yii2-watchlist/src/views/watchlist-movie/index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
    ?>

</div>