<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\watchlist\models\WatchlistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Watchlists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="watchlist-index">
    <a href="<?php echo Url::toRoute(['/movie/movie/index']); ?>" style="font-size:2em; margin-right:2em;">Movies</a>
    <a href="<?php echo Url::toRoute(['/watchlist/watchlist/index']); ?>" style="font-size:2em; margin-right:2em;">My Watchlists</a>
    <a href="<?php echo Url::toRoute(['/comment/comment/index']); ?>" style="font-size:2em; margin-bottom: 2em;">My Comments</a>
    <h1><?= Html::encode($this->title) ?></h1>



    <?php
    if (Yii::$app->user->isGuest) {
        echo '<h4 style="color: red;">You can only view watchlists created by you. Please login.</h4>';
    } else {
        echo "<p>" . Html::a('Create Watchlist', ['create'], ['class' => 'btn btn-success']) . "</p>";
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    }
    ?>


</div>