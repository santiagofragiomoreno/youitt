<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_in".
 *
 * @property int $id
 * @property int $pantry_clients_id
 * @property int $client_id
 * @property string $productos_codigo
 * @property double $productos_peso_producto
 * @property string $created_at
 */
class Productin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_in';
    }
    
    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            [
                'class'                 => \yii\behaviors\TimestampBehavior::className(),
                'createdAtAttribute'    => 'created_at',
                'updatedAtAttribute'    => 'updated_at',
                'value'                 => new \yii\db\Expression('now()'),
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pantry_clients_id', 'client_id', 'productos_codigo'], 'required'],
            [['pantry_clients_id', 'client_id'], 'integer'],
            [['productos_peso_producto'], 'number'],
            [['created_at'], 'safe'],
            [['productos_codigo'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pantry_clients_id' => Yii::t('app', 'Pantry Clients ID'),
            'client_id' => Yii::t('app', 'Client ID'),
            'productos_codigo' => Yii::t('app', 'Productos Codigo'),
            'productos_peso_producto' => Yii::t('app', 'Productos Peso Producto'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
