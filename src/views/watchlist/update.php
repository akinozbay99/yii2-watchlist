<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\watchlist\models\Watchlist */

$this->title = 'Update Watchlist: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Watchlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="watchlist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
