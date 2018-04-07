<?php

namespace app\controllers;

use Yii;
use app\models\Permisos;
use app\models\UsuariosHasPermisos;
use app\models\UsuariosHasPermisosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * UsuariosHasPermisosController implements the CRUD actions for UsuariosHasPermisos model.
 */
class UsuariosHasPermisosController extends Controller
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
     * Lists all UsuariosHasPermisos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuariosHasPermisosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UsuariosHasPermisos model.
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
     * Creates a new UsuariosHasPermisos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UsuariosHasPermisos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpermiso_usuario]);
        } else {
            $permisos = new Permisos();
            $items=ArrayHelper::map(Permisos::find()->all(),'idpermiso','descripcion');

            return $this->render('create', [
                'model2' => $model,
                'permisos' =>$permisos,
                'items' =>$items,
            ]);
        }
    }

    /**
     * Updates an existing UsuariosHasPermisos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpermiso_usuario]);
        } else {
            $permisos = new Permisos();
            $items=ArrayHelper::map(Permisos::find()->all(),'idpermiso','descripcion');
            

            return $this->render('update', [
                'model2' => $model,
                'permisos' =>$permisos,
                'items' =>$items,
            ]);
        }
    }

    /**
     * Deletes an existing UsuariosHasPermisos model.
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
     * Finds the UsuariosHasPermisos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UsuariosHasPermisos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UsuariosHasPermisos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
