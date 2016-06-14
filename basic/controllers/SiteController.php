<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SystemModel;
use yii\web\Session;

class SiteController extends Controller
{	
	//function for add inventory
	public function actionAddinventory(){
		$model = new SystemModel();
		$array = array(
			'date' => $_GET['date'],
			'product_name' =>$_GET['product_name'],
			'product_desc' => $_GET['product_desc'],
			'quantity' =>  $_GET['quantity'],
			'orig_price' =>  $_GET['orig_price'],
			'sell_price' => $_GET['sell_price'],
		);
		$model->add_inventory($array);
		$session = Yii::$app->session;
		$ret = $model->ret_data();
		$data_inventory = $model->view_inventory($session['month_inventory']);
		$data_sales = $model->view_sales($session['month_sales']);
		
		return $this->render('index', ['inventory'=>$ret,'data_inventory'=>$data_inventory, 'data_sales'=>$data_sales, 'month_inventory'=>$session['month_inventory'],'month_inventory'=>$session['month_inventory'],'month_sales'=>$session['month_sales'], 'del_inv' =>$session['del_inv'],]);
	}
	//function that adds sales
	public function actionAddsales(){
		$model = new SystemModel();
		$array = array(
			'date' => $_GET['date'],
			'product_name' =>$_GET['product_name'],
			'quantity' =>  $_GET['quantity'],
			'sell_price' => $_GET['sell_price'],
		);
		$model->add_sales($array);
		$session = Yii::$app->session;
		$ret = $model->ret_data();
		$data_inventory = $model->view_inventory($session['month_inventory']);
		$data_sales = $model->view_sales($session['month_sales']);
		
		return $this->render('index', ['inventory'=>$ret,'data_inventory'=>$data_inventory, 'data_sales'=>$data_sales, 'month_inventory'=>$session['month_inventory'],'month_inventory'=>$session['month_inventory'],'month_sales'=>$session['month_sales'], 'del_inv' =>$session['del_inv'],]);
		}
	
	public function actionAddquantity(){
		$model = new SystemModel();
		$array = array(
			'product_name' =>$_GET['product_name'],
			'quantity' =>  $_GET['quantity'],
		);
		$model->add_quantity($array);
		$session = Yii::$app->session;
		$ret = $model->ret_data();
		$data_inventory = $model->view_inventory($session['month_inventory']);
		$data_sales = $model->view_sales($session['month_sales']);
		
		return $this->render('index', ['inventory'=>$ret,'data_inventory'=>$data_inventory, 'data_sales'=>$data_sales, 'month_inventory'=>$session['month_inventory'],'month_inventory'=>$session['month_inventory'],'month_sales'=>$session['month_sales'], 'del_inv' =>$session['del_inv'],]);
		
	}
	public function actionGetmonthinventory(){
		$session = Yii::$app->session;
		$session['month_inventory'] = $_GET['month_inventory'];
		$model = new SystemModel();
		$ret = $model->ret_data();
		$session = Yii::$app->session;
		$data_inventory = $model->view_inventory(	$session['month_inventory']);
		$data_sales = $model->view_sales($session['month_sales']);
		return $this->render('index', ['inventory'=>$ret,'data_inventory'=>$data_inventory, 'data_sales'=>$data_sales, 'month_inventory'=>$session['month_inventory'],'month_inventory'=>$session['month_inventory'],'month_sales'=>$session['month_sales'], 'del_inv' =>$session['del_inv'],]);
	}
	
	public function actionGetmonthsales(){
		$session = Yii::$app->session;
		$session['month_sales'] = $_GET['month_sales'];
		$model = new SystemModel();
		$ret = $model->ret_data();
		$session = Yii::$app->session;
		$data_inventory = $model->view_inventory();
		$data_sales = $model->view_sales();
		
		return $this->render('index', ['inventory'=>$ret,'data_inventory'=>$data_inventory, 'data_sales'=>$data_sales, 'month_inventory'=>$session['month_inventory'],'month_inventory'=>$session['month_inventory'],'month_sales'=>$session['month_sales'], 'del_inv' =>$session['del_inv'],]);
	}
	
	public function actionDeleteinventory(){
		$session['del_inv'] = $_GET['del_inv'];
		$session = Yii::$app->session;
		$model = new SystemModel();
		$ret = $model->ret_data();
		$session = Yii::$app->session;
		$data_inventory = $model->view_inventory();
		$data_sales = $model->view_sales();
		
		return $this->render('index', ['inventory'=>$ret,'data_inventory'=>$data_inventory, 'data_sales'=>$data_sales, 'month_inventory'=>$session['month_inventory'],'month_inventory'=>$session['month_inventory'],'month_sales'=>$session['month_sales'], 'del_inv' =>$session['del_inv'],]);
		
	}
	
	 public function actionIndex()
    {
		$model = new SystemModel();
		$ret = $model->ret_data();
		$session = Yii::$app->session;
		$session['month_inventory'] = '';
		$session['month_sales'] = '';
		$session['del_inv'] = '';
		
		$data_inventory = $model->view_inventory($session['month_inventory']);
		$data_sales = $model->view_sales($session['month_sales']);
		
	return $this->render('index', ['inventory'=>$ret,'data_inventory'=>$data_inventory, 'data_sales'=>$data_sales, 'month_inventory'=>$session['month_inventory'],'month_inventory'=>$session['month_inventory'],'month_sales'=>$session['month_sales'], 'del_inv' =>$session['del_inv'],]);
	}
	
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

   

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
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

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
