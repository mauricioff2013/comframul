<?php

namespace app\controllers;

use Yii;
use app\models\PlanDePago;
use app\models\MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\sqlDataProvider;
use yii\base\Model;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class PlanpagoController extends Controller
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
     * Lists all Menu models.
     * @return mixed
     */
    public function actionFechaspago()
    {
        $searchModel = new PlanDePago();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);


$count = Yii::$app->db2->createCommand('select count(*) from dba.COOPERATIVISTAS,dba.CREDITOS,dba.Plan_de_Pago
where PLP_CUENTA=CRE_CODIGO_CTA and CRE_CODIGO_COOP=COOP_CODIGO and CRE_SALDO>0 and PLP_FECHA_PAGO>= DATEADD(Month,-1,getdate()) and PLP_FECHA_PAGO<= DATEADD(Month,1,getdate())')->queryScalar();

$dataProvider = new SqlDataProvider([
    'sql' => 'select coop_codigo Codigo,cre_codigo_cta Cuenta,COOP_NOMBRE Nombre,COOP_TEL Telefono1,COOP_TEL2 Telefono2,COOP_CORREO_ELEC Correo,PLP_FECHA_PAGO FechaPago,CRE_SALDO Saldo, CRE_PAGO_PLANILLA pagoplanilla,(PLP_INTERES_PAGAR+PLP_CAPITAL_PAGAR) Cuota from dba.COOPERATIVISTAS,dba.CREDITOS,dba.Plan_de_Pago
where PLP_CUENTA=CRE_CODIGO_CTA and CRE_CODIGO_COOP=COOP_CODIGO and CRE_SALDO>0 and PLP_FECHA_PAGO>= DATEADD(Month,-1,getdate()) and PLP_FECHA_PAGO<= DATEADD(Month,1,getdate())',   
    'totalCount' => $count,
    'db' => Yii::$app->db2,
    'sort' => [
        'attributes' => [
            'PLP_CUENTA',
            'PLP_FECHA_PAGO' => [
                //'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
                //'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
                //'default' => SORT_DESC,
                'label' => 'Name',
            ],
        ],
    ],
    'pagination' => [
        'pageSize' => 20,
    ],
]);

        return $this->render('fechaspago', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menu model.
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
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idmenu]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idmenu]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Menu model.
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
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
