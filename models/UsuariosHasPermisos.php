<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "UsuariosHasPermisos".
 *
 * @property integer $idpermiso_usuario
 * @property integer $idpermiso
 * @property integer $idusuario
 *
 * @property Permisos $idpermiso0
 * @property Usuarios $idusuario0
 */
class UsuariosHasPermisos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'UsuariosHasPermisos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpermiso'], 'required'],
            [['idpermiso'], 'integer'],
            [['idpermiso'], 'exist', 'skipOnError' => true, 'targetClass' => Permisos::className(), 'targetAttribute' => ['idpermiso' => 'idpermiso']],
            [['idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['idusuario' => 'idusuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpermiso_usuario' => 'Idpermiso Usuario',
            'idpermiso' => 'Idpermiso',
            'idusuario' => 'Idusuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpermiso0()
    {
        return $this->hasOne(Permisos::className(), ['idpermiso' => 'idpermiso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdusuario0()
    {
        return $this->hasOne(Usuarios::className(), ['idusuario' => 'idusuario']);
    }
}
