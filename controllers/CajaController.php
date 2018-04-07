<?php
use yii\helpers\Html;
namespace app\controllers;

class CajaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


public function actionRecibos()
    {
 
 

    	if (isset( $_POST['nrecibo']) and  $_POST['nrecibo']!='' ) {
 
var_dump($_POST);

  		# code...
    	}else{
        return $this->render('recibos');
    
    }

}}

