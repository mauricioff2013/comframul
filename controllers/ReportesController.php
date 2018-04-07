<?php

namespace app\controllers;

use Yii;
use app\models\Reportes;
use app\models\ReportesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use app\models\Helper;

use Codeception\Exception\TestRuntimeException;


use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\filters\AccessControl;




/**
 * ReportesController implements the CRUD actions for Reportes model.
 */
class ReportesController  extends ReporteController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Reportes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReportesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reportes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


 public function actionContareportes($id)
    {
switch ($id) {
    case 1:
    return $this->render('reporte_conta_calse_30_60');
        break;
         case 2:
    return $this->render('reporte_conta_calse_mas_90');
        break;
    
    default:
        # code...
        break;
}

        
    }


    /**
     * Creates a new Reportes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reportes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idreporte]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Reportes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idreporte]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }



public function actionGenerar($id)
    {
        $ready_for_download = false;
        $filename = "";
        $query = "";
        $dbtype = "";

        
           
            //$filename = date("Y-m-d") . '-' . trim("hola") . '.csv';
            switch ($id) {
                case "1":
                $filename="Reporte-calse-30-60.csv";
                    $query = "select Replace(COOP_NOMBRE, '„', 'N') as 'Nombre Socio',
CRE_CODIGO_CTA as 'codigo de prestamo',
max (PLP_FECHA_PAGO) as 'fecha de pago',
sum(PLP_CAPITAL_PAGAR) as capital,
sum(PLP_INTERES_PAGAR) as interes,
sum(PLP_CAPITAL_PAGAR)+sum(PLP_INTERES_PAGAR) as cuota
from dba.CREDITOS,dba.COOPERATIVISTAS,dba.Plan_de_Pago
where COOP_CODIGO=CRE_CODIGO_COOP and CRE_CODIGO_CTA=PLP_CUENTA  and cre_saldo>=0.01  and CRE_ATRA_VENC=0  and

PLP_FECHA_PAGO>='".$_GET["finicial"]."' and PLP_FECHA_PAGO<='".$_GET["ffinal"]."'
group by COOP_NOMBRE,CRE_CODIGO_CTA
order by COOP_NOMBRE";
                    $ready_for_download = true;
                      $dbtype = "core";
                    break;
                

                case "2":
                $filename="Reporte-Calse-mas-de-60.csv";
                    $query = "select Replace(COOP_NOMBRE, '„', 'N') as 'Nombre Socio',
CRE_CODIGO_CTA as 'codigo de prestamo',
max (PLP_FECHA_PAGO) as 'fecha de pago',
sum(PLP_CAPITAL_PAGAR) as capital,
sum(PLP_INTERES_PAGAR) as interes,
sum(PLP_CAPITAL_PAGAR)+sum(PLP_INTERES_PAGAR) as cuota
from dba.CREDITOS,dba.COOPERATIVISTAS,dba.Plan_de_Pago
where COOP_CODIGO=CRE_CODIGO_COOP and CRE_CODIGO_CTA=PLP_CUENTA  and cre_saldo>=0.01  and CRE_ATRA_VENC=0  and

PLP_FECHA_PAGO>='".$_GET["finicial"]."' 
group by COOP_NOMBRE,CRE_CODIGO_CTA
order by COOP_NOMBRE";
                    $ready_for_download = true;
                      $dbtype = "core";
                    break;

              





            }
            if ($ready_for_download) {
                parent::actionDownloadReport($filename, "usuarios", $query,$dbtype);
            } else {
                throw new NotFoundHttpException('No fue posible generar el reporte.');
            }

       
    }

























    /**
     * Deletes an existing Reportes model.
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
     * Finds the Reportes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reportes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reportes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
