<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client_products".
 *
 * @property int $id
 * @property int $client_id
 * @property string $product_code
 * @property string $product_name
 * @property double $product_quantity
 */
class ClientProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'product_code', 'product_name', 'product_quantity'], 'required'],
            [['client_id'], 'integer'],
            [['product_quantity'], 'number'],
            [['product_code'], 'string', 'max' => 20],
            [['product_name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'client_id' => Yii::t('app', 'Client ID'),
            'product_code' => Yii::t('app', 'Product Code'),
            'product_name' => Yii::t('app', 'Product Name'),
            'product_quantity' => Yii::t('app', 'Product Quantity'),
        ];
    }
}
