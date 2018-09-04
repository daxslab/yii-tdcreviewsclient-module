<?php

namespace daxslab\tdcreviewsclient\controllers;

use daxslab\tdcreviewsclient\models\ReviewData;
use Yii;
use yii\base\ErrorException;
use yii\data\ArrayDataProvider;
use yii\httpclient\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{
    public function init()
    {
        $this->viewPath = $this->module->viewPath;
    }

    public function actionIndex()
    {
        $dataProvider = new ArrayDataProvider([
            'allModels' => Yii::$app->reviewsClient->getReviews(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new ReviewData();

        try {
            if ($model->load(Yii::$app->request->post()) AND $model->send()) {
                Yii::$app->session->setFlash('send-review-success', Yii::t('app', 'Your review has been sended.'));
                return $this->redirect(['index']);
            }
        } catch (ErrorException $e) {
            Yii::$app->session->setFlash('send-review-error', Yii::t('app', $e->getMessage()));
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

}
