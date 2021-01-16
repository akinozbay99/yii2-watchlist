<?php

namespace xedeer\watchlist\controllers;

use Yii;
use xedeer\watchlist\models\WatchlistMovie;
use xedeer\watchlist\models\WatchlistMovieSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * WatchlistMovieController implements the CRUD actions for WatchlistMovie model.
 */
class WatchlistMovieController extends Controller
{

    /**
     * Lists all WatchlistMovie models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WatchlistMovieSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WatchlistMovie model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WatchlistMovie model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $movie_id = Yii::$app->request->bodyParams["WatchlistMovie"]["movie_id"];
        $watchlist_ids = Yii::$app->request->bodyParams["Watchlist"]["id"];
        if (!is_array($watchlist_ids) or sizeof($watchlist_ids) == 0) {
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        } else {
            foreach ($watchlist_ids as $id) {
                $watchlist_movie_model = new WatchlistMovie();
                $watchlist_movie_model->watchlist_id = $id;
                $watchlist_movie_model->movie_id = $movie_id;
                $watchlist_movie_model->save();
            }
        }
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionBatchDelete()
    {
        $movie_id = Yii::$app->request->bodyParams["WatchlistMovie"]["movie_id"];
        $watchlist_ids = Yii::$app->request->bodyParams["Watchlist"]["id"];
        if (!is_array($watchlist_ids) or sizeof($watchlist_ids) == 0) {
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        } else {
            foreach ($watchlist_ids as $id) {
                WatchlistMovie::deleteAll(["watchlist_id" => $id, "movie_id" => $movie_id]);
            }
        }
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    /**
     * Updates an existing WatchlistMovie model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WatchlistMovie model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    /**
     * Finds the WatchlistMovie model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WatchlistMovie the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WatchlistMovie::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
