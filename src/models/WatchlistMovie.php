<?php

namespace xedeer\watchlist\models;

use Yii;
use frontend\modules\movie\models\Movie;

/**
 * This is the model class for table "watchlist_movie".
 *
 * @property int $id
 * @property int|null $movie_id
 * @property int|null $watchlist_id
 *
 * @property Movie $movie
 * @property Watchlist $watchlist
 */
class WatchlistMovie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'watchlist_movie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['movie_id', 'watchlist_id'], 'integer'],
            [['movie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Movie::className(), 'targetAttribute' => ['movie_id' => 'id']],
            [['watchlist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Watchlist::className(), 'targetAttribute' => ['watchlist_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'movie_id' => 'Movie ID',
            'watchlist_id' => 'Watchlist ID',
        ];
    }

    /**
     * Gets query for [[Movie]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMovie()
    {
        return $this->hasOne(Movie::className(), ['id' => 'movie_id']);
    }

    /**
     * Gets query for [[Watchlist]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWatchlist()
    {
        return $this->hasOne(Watchlist::className(), ['id' => 'watchlist_id']);
    }
    
    
}
