<?php

namespace daxslab\tdcreviewsclient;

use Yii;
use yii\base\InvalidParamException;
use yii\base\Module as BaseModule;

class Module extends BaseModule
{
    public $tdc_slug = null;
    public $tdc_id = null;
    public $newReviewButtonLabel = 'new';

    public function init()
    {
        parent::init();

        if($this->tdc_slug == null){
            throw new InvalidParamException(Yii::t('app', "$tdc_slug must be set"));
        }

        Yii::$app->set('reviewsClient', [
            'class' => 'daxslab\tdcreviewsclient\components\Client',
            'slug' => $this->tdc_slug,
            'id' => $this->tdc_id,
        ]);

    }

}
