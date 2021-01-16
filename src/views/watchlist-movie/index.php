<?php

use yii\helpers\Html;
use yii\grid\GridView;
use xedeer\movie\models\Movie;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\watchlist\models\WatchlistMovieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Watchlist Movies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="watchlist-movie-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'Movie Title',
                'format' => 'raw',
                'value' => function ($data) {
                    $movie_url = Url::toRoute(['/movie/movie/view', 'id' => $data->movie_id]);
                    $movie_name = Movie::find()->where("id=$data->movie_id")->one()->title;
                    return "<a href=\"$movie_url\">$movie_name</a>";
                }
            ],
            [
                'attribute' => 'Delete',
                'format' => 'raw',
                'value' => function ($data) {
                    $url = Url::toRoute(['/watchlist/watchlist-movie/delete', 'id' => $data->id]);
                    return "<a href=\"$url\">Delete</a>";
                }
            ],
        ],
    ]); ?>


</div>