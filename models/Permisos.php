<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permisos".
 *
 * @property integer $idpermiso
 * @property string $descripcion
 * @property integer $idmenu
 * @property string $action
 *
 * @property UsuariosHasPermisos[] $usuariosHasPermisos
 * @property Menu $idmenu0
 */
class Permisos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permisos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['idmenu'], 'integer'],
            [['descripcion'], 'string', 'max' => 30],
            [['action'], 'string', 'max' => 50],
            [['idmenu'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['idmenu' => 'idmenu']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpermiso' => 'Idpermiso',
            'descripcion' => 'Descripcion',
            'idmenu' => 'Idmenu',
            'action' => 'Action',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuariosHasPermisos()
    {
        return $this->hasMany(UsuariosHasPermisos::className(), ['idpermiso' => 'idpermiso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdmenu0()
    {
        return $this->hasOne(Menu::className(), ['idmenu' => 'idmenu']);
    }
}
