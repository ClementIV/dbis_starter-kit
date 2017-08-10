<?php

namespace backend\controllers\attendance;

use Yii;
use backend\models\AtdLate;
use backend\models\search\AtdLateQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\ViewInfo;
use backend\models\AtdRecord;
/**
 * AtdLateController implements the CRUD actions for AtdLate model.
 */
class AtdLateController extends Controller
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
     * Lists all AtdLate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AtdLateQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AtdLate model.
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
     * Creates a new AtdLate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AtdLate();
        $info = ViewInfo::getInfoById(Yii::$app->user->identity->id);
        // $record = AtdRecord::getRecordById(Yii::$app->user->identity->id);
        if ($model->load(Yii::$app->request->post()) ) {
            try{
                $record = AtdRecord::getLateRecord($info[0]['ccid'],$model['date'],$model['category']);
                if($record>0){
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->lid]);
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
     * Updates an existing AtdLate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $info = ViewInfo::getInfoById(Yii::$app->user->identity->id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->lid]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'info' =>$info[0],
            ]);
        }
    }

    /**
     * Deletes an existing AtdLate model.
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
     * Finds the AtdLate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AtdLate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AtdLate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
