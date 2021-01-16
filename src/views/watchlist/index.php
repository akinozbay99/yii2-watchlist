<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\watchlist\models\WatchlistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Watchlists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="watchlist-index">

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