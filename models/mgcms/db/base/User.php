<?php

namespace app\models\mgcms\db\base;

use app\components\mgcms\MgHelpers;
use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $role
 * @property integer $status
 * @property string $email
 * @property string $created_on
 * @property string $last_login
 * @property integer $created_by
 * @property string $address
 * @property string $postcode
 * @property string $birthdate
 * @property string $city
 * @property string $auth_key
 * @property string $file_id
 * @property string $country
 * @property string $voivodeship
 * @property string $street
 * @property string $flat_no
 * @property string $citizenship
 * @property string $id_document_type
 * @property string $id_document_no
 * @property string $pesel
 *
 * @property \app\models\mgcms\db\User $createdBy
 * @property \app\models\mgcms\db\User[] $users
 * @property \app\models\mgcms\db\File $file
 */
class User extends \app\models\mgcms\db\AbstractRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
   * @inheritdoc
   */


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\app\models\mgcms\db\User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\app\models\mgcms\db\User::className(), ['created_by' => 'id']);
    }


    /**
     * @inheritdoc
     * @return \app\models\mgcms\db\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\mgcms\db\UserQuery(get_called_class());
    }
}
