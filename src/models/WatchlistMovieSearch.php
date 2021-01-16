<?php

namespace xedeer\watchlist\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use xedeer\watchlist\models\WatchlistMovie;

/**
 * WatchlistMovieSearch represents the model behind the search form of `frontend\modules\watchlist\models\WatchlistMovie`.
 */
class WatchlistMovieSearch extends WatchlistMovie
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'movie_id', 'watchlist_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = WatchlistMovie::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'watchlist_id' => $params["watchlist_id"],
        ]);

        return $dataProvider;
    }
}
