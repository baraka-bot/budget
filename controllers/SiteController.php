<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\budget;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        
        $posts= budget::find()->all();
        // exit(print_r($posts));
        // echo'</pre>';
        //exit();
        return $this->render('home',['budget'=>$posts]);
    }
  /**
      * This is a view Page
      */
     
      public function actionView($id){
       
        $post= budget::findOne($id); 
        return $this->render('view',['post'=>$post]);
      }

       /**
      * This is a Update Page
      */
      public function actionUpdate($id){

        $post= budget::findOne($id); 
        if( $post->load(Yii::$app->request->post())&&$post->save() ){
            Yii::$app->getSession()->setFlash('message','Post Updated Successfully');
            return $this->redirect(['index','id'=>$post->id]);
        }
        else{
            return $this->render('update',['post'=>$post]);
        }
        
      }

      public function actionDelete($id){
      $post= budget::findOne($id)->delete();
      if($post){
          Yii::$app->getSession()->setFlash('message','Post deleted Successfully');
            return $this->redirect(['index']);
      }
       else{
       }
    
      }

     public function actionCreate(){
        //echo"Create Post";
        $post = new budget();
        $formData = Yii::$app->request->post();
        if($post->load($formData)){
            if($post->save()){
                Yii::$app->getSession()->setFlash('message','Post Published Successfully');
                return $this->redirect(['index']);
            }
            else{
                Yii::$app->getSession()->setFlash('message','failed to post.');
            }
        }
        return $this->render('create',['post'=>$post]);
        
     }
   

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }



/**
 * Display sign up page
 * 
 * @return string
 */

 public function actionSignup()
 {
     return $this->render('signup');
 }

//  public function actionHome()
//  {
//      return $this->render('home');
//  }
 
}
//
//
// this is what i have change to see the effect