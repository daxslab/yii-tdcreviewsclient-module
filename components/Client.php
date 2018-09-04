<?php

namespace daxslab\tdcreviewsclient\components;

use yii\base\Exception;
use yii\httpclient\Client as BaseClient;
use yii\web\ServerErrorHttpException;

/**
 * Description of ReviewsClient
 *
 * @author ccesar
 */
class Client extends BaseClient
{
    public $baseUrl = 'http://api.tdc.com';
    public $slug;
    public $id;

    public function getReviews($limit = null)
    {
        $response = $this->get("reviews/{$this->slug}")->send();
        if (!$response->isOk) {
            $data = $response->getData();
            $type = $data['type'];
            throw new $type($data['message']);
        }
        return $response->getData();
    }

    public function sendReview($data)
    {
        $data['slug'] = $this->slug;
        $response = $this->post('reviews', $data)->send();
        if (!$response->isOk) {
            $data = $response->getData();
            $type = $data['type'];
            throw new $type($data['message']);
        }
        return $response->isOk;
    }

}
