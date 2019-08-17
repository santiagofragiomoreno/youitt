<?php

namespace backend\controllers;

use Yii;
use common\models\Productin;
use common\models\ClientProducts;
use backend\models\search\ProductinSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Productos;
use common\models\Client;

/**
 * ProductinController implements the CRUD actions for Productin model.
 */
class ProductinController extends Controller
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
     * Lists all Productin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Productin();
        $get = null;
        if(isset(Yii::$app->request->get()["Productin"])){
            $get = Yii::$app->request->get()["Productin"];
            if(isset($get['codigo_despensa']) && $get['codigo_despensa'] != null && isset($get['codigo_cliente']) && $get['codigo_cliente'] != null
                && isset($get['codigo_producto']) && $get['codigo_producto'] != null && isset($get['peso_producto']) && $get['peso_producto'] != null){
                
                //primero deberiamos buscar si el producto lo tiene el cliente ya en su base de datos
                //---tabla client_products----
                //buscamos en la base de datos de productos del cliente
                    $cogdigo_producto = $get['codigo_producto'];
                    $codigo_cliente = $get['codigo_cliente'];
                    $client_product = ClientProducts::find()->where(['product_code' => $cogdigo_producto])->andwhere(['client_id' => $codigo_cliente])->all();
                //si esta...procedemos normal...
                if($client_product != null){
                    
                    $model->pantry_clients_id = $get['codigo_despensa'];
                    $model->client_id = $get['codigo_cliente'];
                    $model->productos_codigo = $get['codigo_producto'];
                    $model->productos_peso_producto= $get['peso_producto'];
                    if($model->save()){
                        //una vez que hemos guardado la entrada del producto
                        //lo guardamos en la tabla de -- client_products--
                        //si ya tiene algo de eso producto dentro...sumamos y actualizamos y si no guardamso los que tengamos de peso en la bascula
                        if($client_product[0]->product_quantity > 0){
                                $client_product[0]->product_quantity = $client_product[0]->product_quantity + $model->productos_peso_producto;
                                //actualizamos
                                $client_product[0]->update();
                         }
                         elseif($client_product[0]->product_quantity <= 0){
                                $client_product[0]->product_quantity = $model->productos_peso_producto;
                                $client_product[0]->save();
                         }
                         return "ok";
                    }
                    else{
                        return "fallo al guardar e la tabla de registros";
                    }
                }
                //si no esta...buscamos en la base de datos de todo los productos
                else{
                    $cogdigo_producto = $get['codigo_producto'];
                    $codigo_cliente = $get['codigo_cliente'];
                    $peso_producto = $get['peso_producto'];
                    $product = Productos::find()->where(['codigo' => $cogdigo_producto])->all();
                    //si esta en la BBDD general...
                    if($product != null){
                        //se lo añadimos a su despensa
                        $client_product = new ClientProducts();
                        $client_product->client_id = $codigo_cliente;
                        $client_product->product_code = $cogdigo_producto;
                        $client_product->product_quantity = $peso_producto;
                        //buscamos el nombre del producto y se lo añadimos
                        $client_product->product_name = $product[0]->nombre;
                        //guardamos en la BBDD del clente
                        $client_product->save();
                        //y tambien lo hacemos en la tabla de registros
                        $model->pantry_clients_id = $get['codigo_despensa'];
                        $model->client_id = $get['codigo_cliente'];
                        $model->productos_codigo = $get['codigo_producto'];
                        $model->productos_peso_producto= $get['peso_producto'];
                        $model->save();
                    }
                    else{
                        //si no esta en la BBDD general...lo guardamos el la BBDD general y en la del cliente + email de aviso
                        //1º guardamos en la BBDD del cliente (el producto va sin nombre)
                        $client_product = new ClientProducts();
                        $client_product->client_id = $codigo_cliente;
                        $client_product->product_code = $cogdigo_producto;
                        $client_product->product_quantity = $peso_producto;
                        $client_product->product_name = "PENDIENTE DE VERIFICACION";
                        if($client_product->save()){
                            //2º guardamos en la BBDD general
                            $new_product = new Productos();
                            $new_product->codigo = $cogdigo_producto;
                            $new_product->nombre = "PENDIENTE DE VERIFICACION";
                            $new_product->peso_producto = "0";
                            if($new_product->save()){
                                //3º guardamos en la tabla de registros
                                $model->pantry_clients_id = $get['codigo_despensa'];
                                $model->client_id = $get['codigo_cliente'];
                                $model->productos_codigo = $get['codigo_producto'];
                                $model->productos_peso_producto= $get['peso_producto'];
                                if($model->save()){
                                    //si todo ha salido bien...mandamos email
                                    //buscamos el nombre apellidos del cliente 
                                    //buscamos el email del cliente
                                    $client = Client::findOne(['id' => $model->client_id]);
                                    $message = \Yii::$app->mailer->compose('errorproducto', [
                                       'model'    => $model,
                                       'client'   => $client
                                    ])
                                    ->setFrom('youittcom@gmail.com')
                                    ->setTo('.$client->email.')
                                    ->setBcc('santiagofragio@gmail.com')
                                    ->setSubject('Nuevo Producto Introducido')
                                    ->send();
                                }
                                else{
                                    //error al guardar en la tabla de registros
                                }
                            }
                            else{
                                //error al guardar en la BBDD GENERAL
                            }
                        }
                        else{
                            //error al guardar un nuevo producto en BBDD cliente
                        }
                    }
                    
                }
                
            }
            return $this->render('index');
        }
        elseif(isset(Yii::$app->request->get()["Productout"])){
            $get = Yii::$app->request->get()["Productout"];
            if(isset($get['codigo_despensa']) && $get['codigo_despensa'] != null && isset($get['codigo_cliente']) && $get['codigo_cliente'] != null
                && isset($get['codigo_producto']) && $get['codigo_producto'] != null && isset($get['peso_producto']) && $get['peso_producto'] != null){
                    $model->pantry_clients_id = $get['codigo_despensa'];
                    $model->client_id = $get['codigo_cliente'];
                    $model->productos_codigo = $get['codigo_producto'];
                    $model->productos_peso_producto= -($get['peso_producto']);
                    if($model->save()){
                        //una vez que hemos guardado la entrada del producto
                        //lo guardamos en la tabla de -- client_products--
                        //primero lo buscamos
                        $client_product = ClientProducts::find()->where(['client_id' => $model->client_id])
                        ->andWhere(['product_code' => $model->productos_codigo])
                        ->all();
                        
                        if($client_product != null){
                            //restamos el peso que hemos sado
                            $client_product[0]->product_quantity = $client_product[0]->product_quantity + $model->productos_peso_producto;
                            //en caso que se quede un valor negativo...lo ponemos a 0
                            if($client_product[0]->product_quantity < 0){
                                $client_product[0]->product_quantity = 0;
                            }
                            //actualizamos
                            $client_product[0]->update();
                        }
                        else{
                            return "fallo en el client product";
                        }
                        
                        $hasGet = true;
                        return "ok";
                    }
             }
                    
        }
        return $this->render('index');
        
        /*
        $searchModel = new ProductinSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
    }

    /**
     * Displays a single Productin model.
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
     * Creates a new Productin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Productin();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Productin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Productin model.
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
     * Finds the Productin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Productin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Productin::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
