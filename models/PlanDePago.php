<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Plan_de_Pago".
 *
 * @property integer $PLP_SECUENCIA
 * @property integer $PLP_FILIAL
 * @property integer $PLP_CUENTA
 * @property string $PLP_SEGURO_PAGAR
 * @property string $PLP_APORT_PAGAR
 * @property string $PLP_INTERES_PAGAR
 * @property string $PLP_CAPITAL_PAGAR
 * @property string $PLP_FECHA_MOD
 * @property string $PLP_FECHA_AGR
 * @property string $PLP_FECHA_PAGO
 * @property string $PLP_OBSERVACION
 * @property string $PLP_MODIFICO
 * @property string $PLP_AGREGO
 * @property boolean $PLP_COMPANIA
 */
class PlanDePago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dba.Plan_de_Pago';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PLP_SECUENCIA', 'PLP_FILIAL', 'PLP_CUENTA', 'PLP_FECHA_PAGO', 'PLP_COMPANIA'], 'required'],
            [['PLP_SECUENCIA', 'PLP_FILIAL', 'PLP_CUENTA'], 'integer'],
            [['PLP_SEGURO_PAGAR', 'PLP_APORT_PAGAR', 'PLP_INTERES_PAGAR', 'PLP_CAPITAL_PAGAR'], 'number'],
            [['PLP_FECHA_MOD', 'PLP_FECHA_AGR', 'PLP_FECHA_PAGO'], 'safe'],
            [['PLP_COMPANIA'], 'boolean'],
            [['PLP_OBSERVACION'], 'string', 'max' => 70],
            [['PLP_MODIFICO', 'PLP_AGREGO'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PLP_SECUENCIA' => 'Plp  Secuencia',
            'PLP_FILIAL' => 'Plp  Filial',
            'PLP_CUENTA' => 'Plp  Cuenta',
            'PLP_SEGURO_PAGAR' => 'Plp  Seguro  Pagar',
            'PLP_APORT_PAGAR' => 'Plp  Aport  Pagar',
            'PLP_INTERES_PAGAR' => 'Plp  Interes  Pagar',
            'PLP_CAPITAL_PAGAR' => 'Plp  Capital  Pagar',
            'PLP_FECHA_MOD' => 'Plp  Fecha  Mod',
            'PLP_FECHA_AGR' => 'Plp  Fecha  Agr',
            'PLP_FECHA_PAGO' => 'Plp  Fecha  Pago',
            'PLP_OBSERVACION' => 'Plp  Observacion',
            'PLP_MODIFICO' => 'Plp  Modifico',
            'PLP_AGREGO' => 'Plp  Agrego',
            'PLP_COMPANIA' => 'Plp  Compania',
        ];
    }
}
