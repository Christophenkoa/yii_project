<?php

namespace app\controllers;

use yii\web\Controller;

class PageController extends Controller {

    public function actionAbout() {

        // return $this->renderContent('<h1> Hello World </h1>'); render a content

        // return $this->renderPartial('about'); render without layout

        return $this->render('about', [
            'key' => 'value'
        ]);
    }
}