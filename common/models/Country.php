<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $country_code
 * @property int $cd_pais
 * @property string $name
 * @property string $slug
 * @property string $verified
 * @property string $created_at
 * @property string $updated_at
 * @property int $product_count
 * @property int $product_active_count
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_code', 'name'], 'required'],
            [['cd_pais', 'product_count', 'product_active_count'], 'integer'],
            [['verified'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['country_code'], 'string', 'max' => 5],
            [['name', 'slug'], 'string', 'max' => 255],
            [['cd_pais'], 'unique'],
            [['country_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country_code' => Yii::t('app', 'Country Code'),
            'cd_pais' => Yii::t('app', 'Cd Pais'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'verified' => Yii::t('app', 'Verified'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'product_count' => Yii::t('app', 'Product Count'),
            'product_active_count' => Yii::t('app', 'Product Active Count'),
        ];
    }
}
