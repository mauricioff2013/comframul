<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reportes".
 *
 * @property integer $idreporte
 * @property string $descripcion
 */
class Reportes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reportes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idreporte' => 'Idreporte',
            'descripcion' => 'Descripcion',
        ];
    }
}
