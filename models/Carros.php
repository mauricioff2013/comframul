<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carros".
 *
 * @property integer $id
 * @property string $marca
 * @property integer $year
 * @property string $model
 */
class Carros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year'], 'integer'],
            [['marca', 'model'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marca' => 'Marca',
            'year' => 'Year',
            'model' => 'Model',
        ];
    }
}




