<?php
namespace install\controllers;

use Yii;
use yii\BaseYii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use install\models\CheckEnv;
use install\models\NewDB;
use install\models\CreateDatabase;
use yii\helpers\Html;
use yii\web\ErrorAction;
use yii\base\Exception;
use yii\helpers\Url;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */

     //修改behaviors可以实现按步骤执行的结果
     /*
     *这里地行为设置为access方法，用于只有是login和error可以执行，然后在相应的action里面进行页面跳转
     *对于已经登录的页面而言，只有登出和首页，但是需要role设置
     */
/*   public function behaviors()
    {
       return [
            //命名行为，配置相应的数组。
            //注意一下这里要求必须要先登入。
           'access' => [
            //这里处理一下真实的accesscontrol，注意下这个类的函数功能
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','error','check-env','database','congratulation'],
                        'allow' => true,
                        'roles'=>['?'],
                    ],
                    //这里要求对用户组件要正确配置

                ],
            ],
            //命名行为，配置数组 verbs的具体事项，需要查阅相关类
            //过滤行为？负责登出，

        ];
   }*/
   public function getCount(){
     return $this->count;
   }
   public function actionForm()
   {
      $model=new CreateDatabase();
      return $this->render('form',['model'=>$model,]);
   }
   public function actionNewDb()
   {
     $model=new NewDB();
     if($model->Overwrite){

     }
     else {
       return $this->render('new-db',['model'=>$model]);
     }
   }
   /*
    @check php
    @get OS and free space
   */
   public function actionCongratulation()
   {
   if (!file_exists('lock.lock')){
      fopen('lock.lock','x');
    return $this->render('congratulation');
    }
    else
    {
      return $this->redirect(yii::getAlias('@frontendUrl'));
    }

  //  return ;
  }
   public function actionCheckEnv()
   {
    // return $this->goHome();
    if(file_exists('lock.lock')){
      return $this->redirect(yii::getAlias('@frontendUrl'));
    }
     $model=new CheckEnv();
     $result='defeat!';
     //$yiiVersion=getVersion();
     if($model->checkPHP()){$result=PHP_VERSION;}
    // echo Html::encode($this->render('check-env',['phpve'=>$result,'os'=>$model->getOS(),'space'=>$model->getFreeSpace(),]));
     return $this->render('check-env',['phpve'=>$result,'os'=>$model->getOS(),'space'=>$model->getFreeSpace(),]);
   }
   /*
    @1 check dbserver connnected
    @2 create a new db if it is not exists
    @3 overwrite or  append the old db
   */
   public function actionInstall()
   {
     if(file_exists('lock.lock')){
       return $this->redirect(yii::getAlias('@frontendUrl'));
     }
    //echo Html::encode($this->render('install'));
      $this->redirect(['congratulation']);
   }
   public function actionDatabase()
   {
     if(file_exists('lock.lock')){
       return $this->redirect(yii::getAlias('@frontendUrl'));
     }
     $model=new CreateDatabase();
  //   $model->load(Yii::$app->request->post());
     if($model->load(Yii::$app->request->post())&&$model->validate())
     {

       $check=$model->checkConnect();
       if($check['1'])
       {
      try{

          $model->CreateDB();
          echo  $this->render('install');
          $model->ImportData();
          //$mdoel->ChangeConfig();
         //&&$model->checkConnect()
         //render();
         $model->ChangeConfig();
        //return  $this->redirect(['congratulation']);
          echo '<script> window.location.assign("'.Url::to(['congratulation'], true).'")</script>';
           return;

       }catch(Exception $e)
       {
         throw new Exception("Error Processing Request", $e);

       }

         //return $this->goHome();
       }
       else
       {
         //这里要求就是要提示错误信息。
          return $this->render('database',['model'=>$model,'message'=>'Check your user name and password!',]);
        //  return $this->goHome();
       }

     }
     else
     {
       return $this->render('database',['model'=>$model,'message'=>'']);
     }
   }
   public function actionTest()
   {

     $theTime=date("D M j G:is T Y");
    return  $this->render('Test',['time'=>$theTime]);
   }


    /**
     * @inheritdoc
     */
   public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
      if(file_exists('lock.lock')){
        return $this->redirect(yii::getAlias('@frontendUrl'));
      }
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
          return $this->goHome();
          //return $this->render('index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
   public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
