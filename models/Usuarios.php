<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property integer $idusuario
 * @property string $usuario
 * @property string $clave
 * @property string $nombre
 *
 * @property PermisosUsuarios[] $permisosUsuarios
 */

class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario', 'nombre','cargo'], 'string', 'max' => 50],
            [['clave'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => 'Idusuario',
            'usuario' => 'Usuario',
            'clave' => 'Clave',
            'nombre' => 'Nombre',
            'cargo'=>'Cargo',
        ];
    }

     public static function findIdentity($id)
    {
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return self::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
/*        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;*/
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermisosUsuarios()
    {
        return $this->hasMany(PermisosUsuarios::className(), ['idusuario' => 'idusuario']);
    }


     public static function findByUsername($username)
    {
/*        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }
*/


        return self::findOne(['usuario'=>$username]);
    }


    public function validatePassword($password)
    {
        return $this->clave === $password;
    }   

   /* @param string $username
     * @return static|null
     */
    

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->idusuario;
    }


    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        //return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
   


 /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuariosHasPermisos()
    {
        return $this->hasMany(UsuariosHasPermisos::className(), ['idusuario' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermisos()
    {
        return $this->hasMany(Permisos::className(), ['idpermiso' => 'idpermiso'])->viaTable('UsuariosHasPermisos', ['idusuario' => 'idusuario']);
    }   

     

}








