<?php

namespace app\controllers;

use Yii;
use app\models\Request;
use app\models\RequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\EntryForm;
use app\models\Response;
use app\models\Users;

/**
 * RequestController implements the CRUD actions for Request model.
 */
class RequestController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Request models.
     * @return mixed
     */
    public function actionIndex()
    {
      

        $users = Users::getAll();
        $query_requests = Request::find();
        $requests = $query_requests->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        // $searchModel = new RequestSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            // 'searchModel' => $searchModel,
            // 'dataProvider' => $dataProvider,
            'requests' => $requests,
           
        ]);
    }

    /**
     * Displays a single Request model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {


        $query_my_responses = Response::find();
        $responses = $query_my_responses->where(['id_request' => $id])->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'responses' => $responses
        ]);
    }



    

    /**
     * Creates a new Request model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Request();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }





    /**
     * Updates an existing Request model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Request model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

    public function actionDelete($id){
        $request = Request::findOne($id);
        if($request->delete()){
            return $this->redirect(['request/index']);
            
        }
    }





    public function actionNew()
    {
        $model = new Request();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Добавлено");
        }
  
        $date_today =  date("d.m.Y");
        
        $id_active_user = Yii::$app->user->getId();
        return $this->render('mycreate', [
            'model' => $model,
            $model->user =  $id_active_user,
            $model->date = $date_today,
            $model->status = 0,
              
        ]);
    }




       //enable disable request in site
       public function isAllowed(){
                
        return $this->status;
        
    }
    //enable request in site
    public function actionAllow($id){
        $request= Request::findOne($id);
        if($request->allow()){
            return $this->redirect(['index']);
        }
        
    }
    
    
    // disable request in site
     public function actionDisallow($id){
        $request= Request::findOne($id);
        if($request->disallow()){
            return $this->redirect(['index']);
        }
        
    }







    /**
     * Finds the Request model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Request the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Request::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
