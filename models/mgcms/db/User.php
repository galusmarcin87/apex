<?php

namespace app\models\mgcms\db;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\IdentityInterface;
use \app\models\mgcms\db\base\User as BaseUser;
use kartik\password\StrengthValidator;
use app\components\mgcms\MgHelpers;

/**
 * This is the model class for table "user".
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
 * @property boolean $is_company
 * @property string $citizenship
 * @property string $pesel
 * @property string $birth_country
 * @property string $id_document_type
 * @property string $id_document_no
 * @property string $street
 * @property string $flat_no
 * @property string $phone
 * @property string $company_id
 * @property boolean $is_kyc_filled
 * @property string $language
 * @property string $country
 * @property string $type
 * @property string $company_name
 * @property string $company_nip
 * @property string $company_regon
 * @property string $company_country
 * @property string $company_voivodeship
 * @property string $company_postcode
 * @property string $company_city
 * @property string $company_street
 * @property string $company_house_no
 * @property string $company_flat_no
 * @property string $house_no
 * @property string $cor_first_name
 * @property string $cor_last_name
 * @property string $cor_country
 * @property string $cor_voivodeship
 * @property string $cor_postcode
 * @property string $cor_city
 * @property string $cor_street
 * @property string $cor_house_no
 * @property string $cor_flat_no
 * @property string $bank_no
 * @property string $step
 * @property integer $is_corespondence
 * @property integer $file_text
 * @property integer $acceptTerms5
 * @property integer $acceptTerms6
 * @property string $bank
 * @property string $tax_office
 * @property string $district
 * @property integer $adviser_id
 * @property integer $project_id
 * @property integer $additional_information
 *
 *
 * @property User $createdBy
 * @property User[] $users
 * @property User[] $adviserUsers
 * @property Payment[] $payments
 * @property Payment[] $paymentsApproved
 * @property Project $project
 */
class User extends BaseUser implements IdentityInterface
{

    public $modelAttributes = ['facebook', 'twitter', 'linkedin', 'instagram', 'position', 'googleplus', 'tumblr'];


    const ROLE_ADMIN = 'admin';
    const ROLE_CLIENT = 'client';
    const ROLE_TEAM = 'team';
    const ROLE_PROJECT_OWNER = 'project owner';
    const ROLE_ADVISER = 'adviser';
    const ROLES = [
        self::ROLE_ADMIN,
        self::ROLE_CLIENT,
        self::ROLE_TEAM,
        self::ROLE_PROJECT_OWNER,
        self::ROLE_ADVISER,
    ];
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_VERIFIED = 2;
    const STATUS_SUSPENDED = 3;
    const STATUSES = [
        self::STATUS_ACTIVE => 'active',
        self::STATUS_INACTIVE => 'inactive',
        self::STATUS_VERIFIED => 'verified',
        self::STATUS_SUSPENDED => 'suspended',
    ];


    public $auths = false;
    public $passwordRepeat;
    public $oldPassword;

    public $acceptTerms;

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
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['status', 'created_by', 'file_id', 'acceptTerms5', 'acceptTerms6'], 'integer'],
            [['created_on', 'last_login', 'birthdate', 'country', 'voivodeship', 'street', 'flat_no', 'citizenship', 'id_document_no', 'id_document_type', 'pesel', 'oldPassword'], 'safe'],
            [['username', 'password', 'first_name', 'last_name', 'email', 'address', 'postcode', 'city', 'cor_first_name', 'cor_last_name', 'cor_country', 'cor_voivodeship', 'cor_street', 'cor_flat_no', 'cor_house_no', 'cor_city', 'cor_postcode'], 'string', 'max' => 245],
            [['role', 'language'], 'string', 'max' => 45],
            [['username', 'auth_key'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['email'], 'email'],
            ['passwordRepeat', 'validateOldPassword', 'on' => 'passwordChanging'],
            [['password', 'oldPassword', 'passwordRepeat'], 'required', 'on' => 'passwordChanging'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('db', "Passwords don't match")],
//        [['password'], StrengthValidator::className(), 'min' => 8, 'digit' => 1, 'special' => 1, 'upper' => 1, 'lower' => 1, 'userAttribute' => 'username'],
            [['city', 'first_name', 'last_name', 'citizenship', 'pesel', 'birthdate', 'birth_country', 'document_type', 'street', 'house_no', 'flat_no', 'postcode', 'email', 'phone'], 'required', 'on' => 'kyc'],
            //['acceptTerms', 'required', 'requiredValue' => 1, 'message' => Yii::t('db', 'This field is required'), 'on' => 'account'],
            [['facebook', 'twitter', 'linkedin', 'instagram', 'phone', 'position', 'step', 'type', 'is_corespondence', 'house_no', 'googleplus', 'tumblr'], 'safe'],
            [['first_name', 'last_name', 'linkedin', 'instagram', 'phone', 'position'], 'required', 'on' => 'person'],
            [['company_name', 'company_nip', 'company_regon', 'company_country', 'company_voivodeship', 'company_street', 'company_flat_no', 'company_house_no', 'company_city', 'company_postcode', 'bank_no'], 'safe'],
            [['file_text'], 'string'],
            [['bank', 'tax_office', 'district', 'county'], 'string', 'max' => 255],
            [['adviser_id', 'additional_information', 'project_id'], 'safe'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdviser()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdviserUsers()
    {
        return $this->hasMany(User::className(), ['adviser_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentsApproved()
    {
        return $this->hasMany(Payment::className(), ['user_id' => 'id'])->andWhere(['payment.status' => Payment::STATUS_PAYMENT_CONFIRMED]);
    }

    public function beforeValidate()
    {
        if ($this->isNewRecord) {
            $this->setAuthKey();
        }
        return parent::beforeValidate();
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord || strlen($this->password) != 60) {
            if (!$this->password && !$this->isNewRecord) {
                unset($this->password);
            } else {
                $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            }
        }
        return parent::beforeSave($insert);
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }


    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validateSteps()
    {
        if (!$this->type) {
            $this->addError('type', 'type is required');
        }
    }


    private function setAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString(60);
    }

    public function updateLastLogin()
    {
        $this->last_login = new \yii\db\Expression('NOW()');
        $this->save();
    }

    public function getToString()
    {
        return $this->first_name ? $this->first_name . ' ' . $this->last_name : $this->username;
    }

    public function __toString()
    {
        return $this->getToString();
    }

    public function checkAccess($controller, $action, $role = false)
    {
        if (!$role) {
            $role = $this->role;
        }

        $allowedActions = array('logout', 'login');
        $allowedContollers = array();
        $allowedContollerWithAction = array('defaultindex');

        if (in_array($controller, $allowedContollers) || in_array($action, $allowedActions) || in_array($controller . $action, $allowedContollerWithAction)) {
            return true;
        }
        if (!$this->auths) {
            $this->auths = Auth::find()->asArray()->all();
        }

        $authFound = false;
        foreach ($this->auths as $auth) {
            if ($auth['controller'] == $controller && $auth['action'] == $action && $auth['role'] === $role) {
                $authFound = $auth;
            }
        }

        if (!$authFound) {
            $auth = new Auth;
            $auth->controller = $controller;
            $auth->action = $action;
            $auth->role = $role;
            $auth->value = 0;
            $auth->save();
            if ($role == User::ROLE_ADMIN) {
                return true;
            }
            return false;
        } else {
            if ($role == User::ROLE_ADMIN) {
                return true;
            }
            return $authFound['value'];
        }

        return false;
    }

    public function getStatusStr()
    {
        return Yii::t('app', self::STATUSES[$this->status]);
    }

    public function save($runValidaton = true, $attributes = null)
    {
        $currentLanguage = Yii::$app->language;
//        if ($this->language) {
//            Yii::$app->language = $this->language;
//        }
//        if ($this->getOldAttribute('status') != self::STATUS_SUSPENDED && $this->getAttribute('status') == self::STATUS_SUSPENDED) {
//
//            Yii::$app->mailer->compose('suspendedAccount', ['model' => $this])
//                ->setTo($this->username)
//                ->setFrom([MgHelpers::getSetting('register_email') => MgHelpers::getSetting('register_email_name')])
//                ->setSubject(MgHelpers::getSettingTranslated('user_account_suspended_mail_subject', 'Your account has been suspended'))
//                ->send();
//        }
//
//        if ($this->getOldAttribute('status') == self::STATUS_ACTIVE && $this->getAttribute('status') == self::STATUS_VERIFIED) {
//
//            Yii::$app->mailer->compose('verifiedAccount', ['model' => $this])
//                ->setTo($this->username)
//                ->setFrom([MgHelpers::getSetting('register_email') => MgHelpers::getSetting('register_email_name')])
//                ->setSubject(MgHelpers::getSettingTranslated('user_account_verified_mail_subject', 'Your account has been verified'))
//                ->send();
//        }
//
//        if ($this->getOldAttribute('status') == self::STATUS_SUSPENDED && $this->getAttribute('status') == self::STATUS_VERIFIED) {
//
//            Yii::$app->mailer->compose('reverifiedAccount', ['model' => $this])
//                ->setTo($this->username)
//                ->setFrom([MgHelpers::getSetting('register_email') => MgHelpers::getSetting('register_email_name')])
//                ->setSubject(MgHelpers::getSettingTranslated('user_account_verified_mail_subject', 'Your account has been reverified'))
//                ->send();
//        }

        Yii::$app->language = $currentLanguage;

        return parent::save($runValidaton, $attributes);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(\app\models\mgcms\db\File::className(), ['id' => 'file_id']);
    }

    public function validateOldPassword()
    {
        if ($this->passwordRepeat) {
            if (!$this->oldPassword) {
                $this->addError('oldPassword', Yii::t('db', 'Old passowd missing'));
            }
            try {
                $this->validatePassword($this->oldPassword);
            } catch (InvalidArgumentException $e) {
                $this->addError('oldPassword', Yii::t('db', 'Wrong password'));
            }

            return true;

        }
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'E-mail address'),
            'password' => Yii::t('app', 'Password'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'role' => Yii::t('app', 'Role'),
            'status' => Yii::t('app', 'Status'),
            'statusStr' => Yii::t('app', 'Status'),
            'email' => Yii::t('db', 'Email'),
            'created_on' => Yii::t('app', 'Created On'),
            'last_login' => Yii::t('app', 'Last Login'),
            'created_by' => Yii::t('app', 'Created By'),
            'createdBy' => Yii::t('app', 'Created By'),
            'address' => Yii::t('app', 'Address'),
            'postcode' => Yii::t('db', 'Postcode'),
            'birthdate' => Yii::t('db', 'Birthdate'),
            'city' => Yii::t('app', 'City'),
            'is_company' => Yii::t('db', 'Is company?'),
            'citizenship' => Yii::t('db', 'Citizenship'),
            'pesel' => Yii::t('db', 'Pesel'),
            'birth_country' => Yii::t('db', 'Birth country'),
            'document_type' => Yii::t('db', 'Type of identity document'),
            'street' => Yii::t('db', 'Street'),
            'house_no' => Yii::t('db', 'House number'),
            'flat_no' => Yii::t('db', 'Flat number'),
            'file_id' => Yii::t('app', 'File'),
            'phone' => Yii::t('db', 'Phone'),
            'company_name' => Yii::t('db', 'Company name'),
            'company_id' => Yii::t('db', 'Company identifier'),
            'passwordRepeat' => Yii::t('db', 'Repeat password'),
            'id_document_type' => Yii::t('db', 'Identity document kind'),
            'id_document_no' => Yii::t('db', 'Identity document number'),
            'voivodeship' => Yii::t('db', 'Voivodeship'),
            'acceptTerms' => MgHelpers::getSettingTranslated('account_terms_label', 'Zgoda na ....'),
            'country' => Yii::t('db', 'Country'),
            'oldPassword' => Yii::t('db', 'Old password'),
            'position' => Yii::t('app', 'Position'),
            'cor_first_name' => Yii::t('app', 'First Name'),
            'cor_last_name' => Yii::t('app', 'Last Name'),
            'cor_postcode' => Yii::t('db', 'Postcode'),
            'cor_city' => Yii::t('app', 'City'),
            'birth_country' => Yii::t('db', 'Birth country'),
            'document_type' => Yii::t('db', 'Type of identity document'),
            'cor_street' => Yii::t('db', 'Street'),
            'cor_house_no' => Yii::t('db', 'House number'),
            'cor_flat_no' => Yii::t('db', 'Flat number'),
            'cor_voivodeship' => Yii::t('db', 'Voivodeship'),
            'cor_country' => Yii::t('db', 'Country'),

            'company_name' => Yii::t('db', 'Company name'),
            'company_regon' => Yii::t('db', 'REGON'),
            'company_nip' => Yii::t('db', 'NIP'),
            'company_street' => Yii::t('db', 'Street'),
            'company_house_no' => Yii::t('db', 'House number'),
            'company_flat_no' => Yii::t('db', 'Flat number'),
            'company_voivodeship' => Yii::t('db', 'Voivodeship'),
            'company_country' => Yii::t('db', 'Country'),
            'company_postcode' => Yii::t('db', 'Postcode'),
            'company_city' => Yii::t('app', 'City'),
            'file_text' => 'Pliki oddzielane enterem, nazwa;link',
            'bank' => Yii::t('db', 'Bank'),
            'tax_office' => Yii::t('db', 'Tax office'),
            'district' => Yii::t('db', 'District'),
            'county' => Yii::t('db', 'County'),

        ];
    }
}
