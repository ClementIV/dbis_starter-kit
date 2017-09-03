<?php

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace backend\controllers\attendance;

use backend\models\AtdUser;
use backend\models\search\AtduserQuery;
use backend\models\Viewinfo;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AtdUserController implements the CRUD actions for AtdUser model.
 */
class AtdUserController extends Controller
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
     * Lists all AtdUser models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AtduserQuery();
        //print_r(Yii::$app->request->queryParams);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel = new Viewinfo();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AtdUser model.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        //$this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AtdUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AtdUser();
        $depts = $model->getAllD();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->uid]);
        }
        foreach ($depts as $key => $dept) {
            $drop_list[$dept['did']] = $dept['name'];
        }

        return $this->render('create', [
                'model' => $model,
                'dept' => $drop_list,
            ]);
    }

    /**
     * Updates an existing AtdUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $depts = $model->getAllD();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->uid]);
        }
        foreach ($depts as $key => $dept) {
            $drop_list[$dept['did']] = $dept['name'];
        }

        return $this->render('update', [
                'model' => $model,
                'dept' => $drop_list,
            ]);
    }

    /**
     * Deletes an existing AtdUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AtdUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @throws NotFoundHttpException if the model cannot be found
     *
     * @return AtdUser the loaded model
     */
    protected function findModel($id)
    {
        $model = AtdUser::getOne($id);
        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
