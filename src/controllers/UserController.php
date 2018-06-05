<?php
/**
 * Created by PhpStorm.
 * User: asamat
 * Date: 05.06.18
 * Time: 11:35
 */

namespace sweelix\oauth2\server\controllers;


use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

class UserController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];
        return $behaviors;
    }

    /**
     * @return Response
     * @throws ForbiddenHttpException
     */
    public function actionMe()
    {
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = ['user_id' => Yii::$app->user->getId()];

        return $response;
    }
}