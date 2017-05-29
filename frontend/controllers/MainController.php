<?php

namespace frontend\controllers;

use yii\helpers\Url;

class MainController extends \yii\web\Controller
{

    public function actions()
    {
        return [
        ];
    }

    public function actionError()
    {
        return $this->render('error');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }


}