<?php

namespace xedeer\watchlist\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "watchlist".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 *
 * @property User $user
 * @property WatchlistMovie[] $watchlistMovies
 */
class Watchlist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'watchlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[WatchlistMovies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWatchlistMovies()
    {
        return $this->hasMany(WatchlistMovie::className(), ['watchlist_id' => 'id']);
    }
}
