<?php

namespace app\controllers;
use Yii;
use app\models\Request;
use app\models\RequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RequestController implements the CRUD actions for Request model.
 */
class RequestController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Request models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RequestSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Request model.
     * @param int $id_request Id Request
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_request)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_request),
        ]);
    }

    /**
     * Creates a new Request model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Request();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if(Yii::$app->user->identity->id_role == 2)
                {
                    $model->id_user = Yii::$app->user->identity->id_user;
                    $model->id_status = 1;
                    $model->save();
                }
                if(Yii::$app->user->identity->id_role == 1)
                {
                    $model->id_user = Yii::$app->user->identity->id_user;
                    $model->id_status = 1;
                    $model->save();
                }
                return $this->redirect(['view', 'id_request' => $model->id_request]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Request model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_request Id Request
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_request)
    {
        $model = $this->findModel($id_request);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_request' => $model->id_request]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Request model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_request Id Request
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_request)
    {
        $this->findModel($id_request)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Request model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_request Id Request
     * @return Request the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_request)
    {
        if (($model = Request::findOne(['id_request' => $id_request])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionCancel($id){
      
        $model = $this->findModel($id);
        $model->id_status = 4;
        $model->save(false);
        Yii::$app->session->setFlash('success', 'Вы успешно отменили заявку');
        return $this->redirect(['index']);
    }
    public function actionConfirm($id){
  
        $model = $this->findModel($id);
        $model->id_status = 3;
        $model->save(false);
        Yii::$app->session->setFlash('success', 'Вы успешно подтвердили заявку');
        return $this->redirect(['index']);
    }
    public function actionInprogress($id){
  
        $model = $this->findModel($id);
        $model->id_status = 2;
        $model->save(false);
        Yii::$app->session->setFlash('success', 'Вы успешно начали обработку заявки');
        return $this->redirect(['index']);
    }
}
