<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $model_check = new Users();
        //check level user
           $id_active_user = Yii::$app->user->getId();
           $model_where_user_active = Users::findOne($id_active_user);
           $model_where_user_active = $model_where_user_active->level;
          if($model_where_user_active == 1) {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    else {
        return $this->goHome();
    }
    }




    public function actionProfile($id)
    {

        $model_check = new Users();
        //check level user
           $id_active_user = Yii::$app->user->getId();
           $model_where_user_active = Users::findOne($id_active_user);
           $model_where_user_active = $model_where_user_active->level;
          //if($model_where_user_active == 1) {

        return $this->render('profile', [
            'model' => $this->findModel($id),
        ]);
    //}
    // else {
    //     return $this->goHome();
    // }
    }










    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();
     //check level user
        $id_active_user = Yii::$app->user->getId();
        $model_where_user_active = Users::findOne($id_active_user);
        $model_where_user_active = $model_where_user_active->level;
       if($model_where_user_active == 1) {
    if ($model->load(Yii::$app->request->post()) && $model->save()) {
       //for upload image
           $imageName = time();
           $model->file = UploadedFile::getInstance($model, 'file');
        if(!empty($model->file))
         {
         $model->file->saveAs('uploads/blog_'.$imageName.'.'.$model->file->extension);
          $model->logo = 'uploads/blog_'.$imageName.'.'.$model->file->extension;
          $model->save();
        }
         return $this->redirect(['view', 'id' => $model->id]);
        }
               return $this->render('create', [
            'model' => $model,
        ]);
    }

  else {
    return $this->goHome();

  }
    
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {


        $model_check = new Users();
        //check level user
           $id_active_user = Yii::$app->user->getId();
           $model_where_user_active = Users::findOne($id_active_user);
           $model_where_user_active = $model_where_user_active->level;
          if($model_where_user_active == 1) {
               
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

           //for upload image
           $imageName = time();
           $model->file = UploadedFile::getInstance($model, 'file');
        if(!empty($model->file))
         {
         $model->file->saveAs('uploads/blog_'.$imageName.'.'.$model->file->extension);
          $model->logo = 'uploads/blog_'.$imageName.'.'.$model->file->extension;
          $model->save();
        }




            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);



    }

   else {
       return $this->goHome();
   }


    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
