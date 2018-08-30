<?php

namespace daxslab\tdcreviewsclient\models;

use daxslab\tdcreviews\components\ReviewsClient;
use Yii;
use yii\base\Model;

/**
 * Description of TdcReview
 *
 * @author glpz
 */
class ReviewData extends Model
{
    public $name;
    public $email;
    public $rating;
    public $comment;
    public $like;

    public function rules()
    {
        return [
            [['name', 'email', 'rating', 'comment'], 'required'],
            [['email'], 'email'],
            [['rating'], 'integer', 'min' => 0, 'max' => 5],
            [['name'], 'string', 'max' => 24],
            [['comment'], 'string'],
            ['like', 'compare', 'compareValue' => ''],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'rating' => Yii::t('app', 'Rating'),
            'comment' => Yii::t('app', 'Comment'),
            'place_id' => Yii::t('app', 'Place'),
        ];
    }

    public function send()
    {
        return $this->validate() && Yii::$app->reviewsClient->sendReview($this->attributes);
    }

}
