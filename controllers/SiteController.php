<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\TestModel;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        /* echo '<pre><br><br>';
            var_dump(yii::$app->assetManager);
        echo '</pre>'; */

        // yii::$app->test->hello();
        return $this->render('index');
    }

    // before action 
    public function beforeAction($action) {

        /*if($action->id === 'index'){
            echo '<pre><br><br>';
            var_dump('Index controller');
        echo '</pre>';
        }*/

        $this->layout = 'base';

        return parent::beforeAction($action);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionTest() {
        $test = new TestModel();
        // $test->name = 'John';
        // $test['surname'] = 'Doe';

        /* echo '<pre>';
            var_dump($test->attributes());
        echo '</pre>'; */

        echo '<pre>';
            var_dump($test->getAttributeLabel('name'));
        echo '</pre>';

        foreach($test as $attr =>  $value) {
            echo $test->getAttributeLabel($attr) . '=' . $value . '<br>';
        }

        if($test->validate()) {
            echo 'OK';

        }else {
            echo '<pre>';
            var_dump($test->errors);
            echo '</pre>';
        }

        $post = [
            'name' => 'Nkoa',
            'surname' => 'Christophe',
            'email' => 'nkoachristophe@gmail.com'
        ];

        $test->attributes = $post;

        if($test->validate()) {
            echo '<br><br>OK';

        }else {
            echo '<pre><br><br>';
            var_dump($test->errors);
            echo '</pre>';
        }

    }

    public function actionRequest() {
        echo yii::$app->request->get('id', 50). '<br>';
        echo yii::$app->request->hostInfo;
    }

    public function actionResponse() {
        // return 'Hello world';
        // return $this->redirect('about');
        yii::$app->response->content = 'Hello from response yii app';
    }
}
