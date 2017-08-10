<?php

namespace backend\controllers\attendance;

use Yii;
use backend\models\AtdLeaveEarly;
use backend\models\search\AtdLeaveEarlyQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\ViewInfo;
use backend\models\AtdRecord;

/**
 * AtdLeaveEarlyController implements the CRUD actions for AtdLeaveEarly model.
 */
class AtdLeaveEarlyController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AtdLeaveEarly models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AtdLeaveEarlyQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AtdLeaveEarly model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionErrorApply()
    {
        return $this->render('error-apply');
    }
    /**
     * Creates a new AtdLeaveEarly model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AtdLeaveEarly();

        $info = ViewInfo::getInfoById(Yii::$app->user->identity->id);
        // $record = AtdRecord::getRecordById(Yii::$app->user->identity->id);
        if ($model->load(Yii::$app->request->post()) ) {
            try{
                $record = AtdRecord::getLateRecord($info[0]['ccid'],$model['date'],$model['category']);
                if($record>0){
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->leid]);
                } else {
                    return $this->render('error-apply');
                }
            }catch(Exception $e){
                echo $e;
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'info' =>$info[0],
            ]);
        }
    }

    /**
     * Updates an existing AtdLeaveEarly model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $info = ViewInfo::getInfoById(Yii::$app->user->identity->id);
        if ($model->load(Yii::$app->request->post()) ) {
            try{
                $record = AtdRecord::getLateRecord($info[0]['ccid'],$model['date'],$model['category']);
                if($record>0){
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->leid]);
                } else {
                    return $this->render('error-apply');
                }
            }catch(Exception $e){
                echo $e;
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'info' =>$info[0],
            ]);
        }
    }

    /**
     * Deletes an existing AtdLeaveEarly model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AtdLeaveEarly model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AtdLeaveEarly the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AtdLeaveEarly::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
