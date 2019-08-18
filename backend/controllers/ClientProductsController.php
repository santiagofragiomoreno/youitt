<?php

namespace backend\controllers;

use Yii;
use common\models\ClientProducts;
use backend\models\search\ClientProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Productos;

/**
 * ClientProductsController implements the CRUD actions for ClientProducts model.
 */
class ClientProductsController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all ClientProducts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClientProducts model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ClientProducts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ClientProducts();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //una vez que se lo hemos guardado al cliente//aprovechamos y lo añadimos a la BBDD general
            $product = new Productos();
            $product->codigo = $model->product_code;
            $product->nombre = $model->product_name;
            $product->peso_producto = 0;
            if($product->save()){
                //podriamos meter un hasflash PRODUCTO AÑADIDO TAMBIEN A LA BBDD GENERAL
                \Yii::$app->getSession()->setFlash('success');
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                \Yii::$app->getSession()->setFlash('error');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ClientProducts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $code = $model->product_code;
            $product = Productos::findOne(['codigo' => $code]);
            $product->nombre = $model->product_name;
            if($product->save()){
                \Yii::$app->getSession()->setFlash('success');
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ClientProducts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ClientProducts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClientProducts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClientProducts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
