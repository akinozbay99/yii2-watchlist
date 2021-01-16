<?php
namespace xedeer\watchlist\controllers;

class DefaultController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->redirect(["watchlist/index"]);
    }
}