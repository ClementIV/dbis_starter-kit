<?php

namespace backend\controllers;

use common\models\Tag;
use Yii;
use common\models\UserTeacher;
use backend\models\search\UserTeacherSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserTeacherController implements the CRUD actions for UserTeacher model.
 */
class UserTeacherController extends Controller
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
     * Lists all UserTeacher models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserTeacherSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserTeacher model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserTeacher model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserTeacher();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->userid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserTeacher model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $id=Yii::$app->user->id;
        $model= new UserTeacher();
        $tags = Tag::find()->all();
        $taglist = array();
        foreach ($tags as $num => $item)
        {
            array_push($taglist,$item->getTagName());
        }
        if($this->findModel($id))
        {
            $model=$this->findModel($id);
        } else {
            $model->setScenario('create');
            $model->userid=Yii::$app->user->id;
            if ($model->save()) {
                $this->render('update', [
                    'model' => $model,
                    'taglist' => $taglist,
                ]);
            }
        }

        if ($model->load(Yii::$app->request->post())) {
            $selecttagid = array();
            if (is_array($model->tagid)) {
               foreach ($model->tagid as $num => $item) {
                    array_push($selecttagid, $item+1);
                }
                $model->tagid = implode(',', $selecttagid);
                if($model->save())
                {
                    return $this->redirect(['index']);
                }
            }
        }else {
            return $this->render('update', [
                'model' => $model,
                'taglist' => $taglist,

            ]);
        }

    }

    /**
     * Deletes an existing UserTeacher model.
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
     * Finds the UserTeacher model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserTeacher the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserTeacher::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
