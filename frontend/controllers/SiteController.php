<?php
namespace frontend\controllers;

use frontend\models\search\UserStudentSearch;
use frontend\models\search\UserTeacherSearch;
use common\models\query\UserTeacherQuery;
use Yii;
use frontend\models\ContactForm;
use yii\web\Controller;
use frontend\models\search\ArticleSearch;



/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale'=>[
                'class'=>'common\actions\SetLocaleAction',
                'locales'=>array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }



    public function actionIndex()
    {
        $this->layout = "base";
        //article
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->searchwithoutPage(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['created_at' => SORT_DESC]
        ];
        $dataProvider->query->limit(3);
        //userteacher
        $searchModelUserQuery = new UserTeacherSearch();
        $TeacherModel = $searchModelUserQuery->searchUserProfile1(Yii::$app->request->queryParams);
        $searchModelStudent = new UserStudentSearch();
        $studentModel = $searchModelStudent->searchStudent1(Yii::$app->request->queryParams);
        return $this->render('index', [
            'dataProvider'=>['data0'=>$dataProvider],
            'teacherModel'=>$TeacherModel,
            'studentModel'=>$studentModel
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options'=>['class'=>'alert-success']
                ]);
                return $this->refresh();
            } else {
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>\Yii::t('frontend', 'There was an error sending email.'),
                    'options'=>['class'=>'alert-danger']
                ]);
            }
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }
}
