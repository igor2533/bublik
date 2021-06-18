<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Products;
use app\models\ProductsSearch;
use app\models\Users;
use app\models\EntryForm;
use app\models\Request;
use app\models\SignupForm;

use yii\db\ActiveRecord;


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
            'private-messages' => [
                'class' => \vision\messages\actions\MessageApiAction::className()
            ]
        ];
    }

      //my requests

      public function actionMyrequests()
      {
        $query_my_request = Request::find();
        $requests = $query_my_request->having(['user' => Yii::$app->user->identity->id])->orderBy('date DESC')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        //$query_responses = new Response();
                  
            // $responses = $query_responses->having(['id_request' => 8])->offset($pagination->offset)
            // ->limit($pagination->limit)
            // ->all();






        return $this->render('my-requests',
    [
        'requests'   => $requests,
        'response' =>  $responses,
    ]);

      }


//action messages
      public function actionMessages()
    {
     


        return $this->render('messages');


    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Request::find();
        $query_users = Users::find();
        $pagination = new Pagination([
        'defaultPageSize'  => 10,
        'totalCount' => $query->count(),
        ]);
        $pagination_users = new Pagination([
            'defaultPageSize'  => 10,
            'totalCount' => $query_users->count(),
            ]);
        
        $requests = $query->orderBy('date DESC')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        
             
        $users = $query_users->orderBy('username')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        
        return $this->render('index',
        [
            'users'   => $users,
            'pagination_users' => $pagination_users,
            'requests' => $requests,
            'pagination' => $pagination,
        ]
         );
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Users();
        if ($model->load(Yii::$app->request->post()) 
            && $model->login()) {
            return $this->goBack();
        }
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


    public function actionAdmin()
    {
     
        return $this->render('admin');
    }


     //registration
    

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionEntry()
    {
        // $model = new EntryForm();

        // if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        //     // данные в $model удачно проверены

        //     // делаем что-то полезное с $model ...
 

        //     // $request=new Request;
        //     // $request->title = $model->title;
        //     // $request->price = $model->price;
        //     // // $post->createTime=time();
        //     // $request->save();
      

        //     //return $this->render('entry-confirm', ['model' => $model]);
        // } else {
        //     // либо страница отображается первый раз, либо есть ошибка в данных
        //     return $this->render('entry', ['model' => $model]);
        // }
    }









}
