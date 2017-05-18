<?php

namespace backend\controllers;

use Yii;
use common\models\Post;
use backend\models\search\PostSearch;
use \common\models\PostCategory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class PostController extends \yii\web\Controller
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

    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $wechat = Yii::$app->wechat;
        $list1 = $wechat->listUser('1');
        $list2 = $wechat->listDepartment();
        $useridlist = array();
        $usernamelist = array();
        $departmentid = array();
        $departmentname = array();
        $selectuser = array();
        $selectdepart = array();

        foreach ($list1['userlist'] as $num => $item)
        {
            array_push($useridlist,$item['userid']);
            array_push($usernamelist,$item['name']);
        }
        foreach ($list2['department'] as $num =>$item)
        {
            array_push($departmentid,$item['id']);
            array_push($departmentname,$item['name']);
        }
        if ($model->load(Yii::$app->request->post())) {
            $data=array(
                'touser'=>'@all',
                'toparty'=>'@all',
                'totag'=>'@all',
                'agentid'=>'15',
                'msgtype'=>'text',
                'text'=>array('content'=>$model->title.'\n'.'time:'.$model->begintime.'-'.$model->endtime.'\n'.$model->body),
                'safe'=>0
            );
            if(is_array($model->touser))
            {
                foreach ($model->touser as $num =>$item)
                {
                    array_push($selectuser,$useridlist[$item]);
                }
                $model -> touser = implode('|',$selectuser);
                $data['touser']=$model -> touser;
            }
            if(is_array($model->toparty))
            {
                foreach ($model->toparty as $num =>$item)
                {
                    array_push($selectdepart,$departmentid[$item]);
                }
                $model -> toparty = implode('|',$selectdepart);
                $data['toparty'] = $model ->toparty;
            }
            if($model->save())
            {
                $wechat = Yii::$app->wechat;

                if($wechat->sendMessage($data))
                    return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->toparty="";
            $model->touser="";
            return $this->render('update', [
                'model' => $model,
                'categories' => PostCategory::find()->all(),
                'userlist' => $usernamelist,
                'departmentlist'=> $departmentname
            ]);
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $wechat = Yii::$app->wechat;
        $list1 = $wechat->listUser('1');
        $list2 = $wechat->listDepartment();
        $useridlist = array();
        $usernamelist = array();
        $departmentid = array();
        $departmentname = array();
        $selectuser = array();
        $selectdepart = array();
        foreach ($list1['userlist'] as $num => $item)
        {
            array_push($useridlist,$item['userid']);
            array_push($usernamelist,$item['name']);
            /*            $useridlist = array_merge(array($item['userid'],$item['name']),$useridlist);
                        $useridlist = array_merge(array($item['userid'],$item['name']),$useridlist);*/
        }
        foreach ($list2['department'] as $num =>$item)
        {
            array_push($departmentid,$item['id']);
            array_push($departmentname,$item['name']);
            /*            $department = array_merge(array($item['id'],$item['name']),$department);*/
        }
        $model = new Post();

        if ($model->load(Yii::$app->request->post())) {
            $data=array(
                'touser'=>'@all',
                'toparty'=>'@all',
                'totag'=>'@all',
                'agentid'=>'15',
                'msgtype'=>'text',
                'text'=>array('content'=>$model->title.'\n'.'time:'.$model->begintime.'-'.$model->endtime.'\n'.$model->body),
                'safe'=>0
            );
            if(is_array($model->touser))
            {
                foreach ($model->touser as $num =>$item)
                {
                    array_push($selectuser,$useridlist[$item]);
                }
                $model -> touser = implode('|',$selectuser);
                $data['touser']=$model -> touser;
            }
            if(is_array($model->toparty))
            {
                foreach ($model->toparty as $num =>$item)
                {
                    array_push($selectdepart,$departmentid[$item]);
                }
                $model -> toparty = implode('|',$selectdepart);
                $data['toparty'] = $model ->toparty;
            }
            if($model->save())
            {
                $wechat = Yii::$app->wechat;

                if($wechat->sendMessage($data))
                    return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'categories' => PostCategory::find()->all(),
                'userlist' => $usernamelist,
                'departmentlist'=> $departmentname
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
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
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionWechat()
    {
        $wechat = Yii::$app->wechat;
        $data=array(
            'touser'=>'@all',
            'toparty' =>'7',
            'totag'=>'@all',
            'agentid'=>'38',
            'msgtype'=>'text',
            'text'=>array('content'=>'Test for send message'),
            'safe'=>0
        );
        var_dump($wechat->listUser('1'));
//        return $this->render('wechat');
    }

}
