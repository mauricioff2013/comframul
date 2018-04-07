<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marcaciones".
 *
 * @property integer $id
 * @property string $usuario
 * @property string $Nombre
 * @property string $fecha
 * @property string $hora_inicio
 * @property integer $tipo
 * @property string $hora_final
 * @property string $inicio_almuerzo
 * @property string $fin_almuerzo
 */
class Marcaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marcaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario', 'Nombre', 'fecha'], 'required'],
            [['fecha', 'hora_inicio', 'hora_final', 'inicio_almuerzo', 'fin_almuerzo'], 'safe'],
            [['tipo'], 'integer'],
            [['usuario'], 'string', 'max' => 20],
            [['Nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'Nombre' => 'Nombre',
            'fecha' => 'Fecha',
            'hora_inicio' => 'Hora Inicio',
            'tipo' => 'Tipo',
            'hora_final' => 'Hora Final',
            'inicio_almuerzo' => 'Inicio Almuerzo',
            'fin_almuerzo' => 'Fin Almuerzo',
        ];
    }
}
