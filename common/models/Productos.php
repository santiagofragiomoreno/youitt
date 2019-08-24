<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id_producto
 * @property string $codigo
 * @property string $nombre
 * @property double $peso_producto
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'nombre'], 'required'],
            [['peso_producto'], 'number'],
            [['codigo'], 'string', 'max' => 20],
            [['nombre'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => Yii::t('app', 'Id Producto'),
            'codigo' => Yii::t('app', 'Codigo'),
            'nombre' => Yii::t('app', 'Nombre'),
            'peso_producto' => Yii::t('backend', 'Peso Producto'),
        ];
    }
}
