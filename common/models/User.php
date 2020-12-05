<?php
namespace common\models;

use borales\extensions\phoneInput\PhoneInputValidator;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;
use yiidreamteam\upload\ImageUploadBehavior;

/**
 * User model
 *
 * @property integer $id
 * @property string $password_hash
 * @property string $seriesParport
 * @property string $birth_date
 * @property string $jshsh
 * @property string $sex
 * @property string $last_name
 * @property string $firstname
 * @property string $secount_name
 * @property string $photo
 * @property string $phone
 * @property integer $region_id
 * @property integer $part_id
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    public $file;
    public $password;

    public static function tableName()
    {
        return '{{%user}}';
    }

    public function beforeValidate() : bool
    {
        if (parent::beforeValidate()) {
            $this->file = UploadedFile::getInstance($this, 'file');
            return true;
        }
        return false;
    }
    public function rules()
    {
        return [
            [['firstname', 'secount_name', 'last_name', 'sex', 'jshsh', 'birth_date', 'seriesParport', 'email', 'phone', 'part_id', 'region_id'], 'required'],
            [['part_id', 'region_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['firstname', 'secount_name', 'last_name', 'sex', 'birth_date', 'seriesParport', 'email', 'phone', 'password_hash', 'password_reset_token', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['jshsh'], 'integer'],
            [['password'], 'string'],
            [['file'], 'image'],
            [['file'], 'required'],
            [['email'], 'unique'],
            [['email'], 'email'],
            [['password_reset_token'], 'unique'],
            [['part_id'], 'exist', 'skipOnError' => true, 'targetClass' => Parties::className(), 'targetAttribute' => ['part_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firstname' => Yii::t('app', 'Firstname'),
            'secount_name' => Yii::t('app', 'Secount Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'sex' => Yii::t('app', 'Sex'),
            'jshsh' => Yii::t('app', 'Jshsh'),
            'birth_date' => Yii::t('app', 'Birth Date'),
            'seriesParport' => Yii::t('app', 'Pasport Series'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'part_id' => Yii::t('app', 'Part ID'),
            'region_id' => Yii::t('app', 'Region ID'),
            'photo' => Yii::t('app', 'Photo'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'verification_token' => Yii::t('app', 'Verification Token'),
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['updated_at', 'created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
            [
                'class' => ImageUploadBehavior::class,
                'attribute' => 'photo',
                'createThumbsOnRequest' => true,

                'filePath' => '@frontend/web/app-images/store/students/[[attribute_id]]/[[filename]].[[extension]]',
                'fileUrl' => '@url/app-images/store/students/[[attribute_id]]/[[filename]].[[extension]]',

                'thumbPath' => '@frontend/web/app-images/cache/students/[[attribute_id]]/[[profile]]_[[filename]].[[extension]]',
                'thumbUrl' => '@url/app-images/cache/students/[[attribute_id]]/[[profile]]_[[filename]].[[extension]]',
                'thumbs' => [
                    'xs' => ['width' => 30, 'height' => 40],
                    'sm' => ['width' => 60, 'height' => 80],
                    'md' => ['width' => 120, 'height' => 160],
                    'lg' => ['width' => 360, 'height' => 480],
                ],
            ],
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->id == 1) {
            $this->status = self::STATUS_ACTIVE;
        }

        if ($this->password) {
            $this->setPassword($this->password);
        }
        $this->generateAuthKey();

        return parent::beforeSave($insert);
    }


    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }


    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    public function getPart()
    {
        return $this->hasOne(Parties::className(), ['id' => 'part_id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }
}
