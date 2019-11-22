<?php
namespace app\models;

use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use Yii;

class RegistrationForm extends BaseRegistrationForm
{
    /**
     * @var string User email address
     */
    public $email;

    /**
     * @var string Username
     */
    public $username;

    /**
     * @var string Password
     */
    public $password;

    public $item_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $user = $this->module->modelMap['User'];

        return [
        	// [['role'],'string'],
            // username rules
            'usernameTrim'     => ['username', 'trim'],
            'usernameLength'   => ['username', 'string', 'min' => 3, 'max' => 255],
            'usernamePattern'  => ['username', 'match', 'pattern' => $user::$usernameRegexp],
            'usernameRequired' => ['username', 'required'],
            'usernameUnique'   => [
                'username',
                'unique',
                'targetClass' => $user,
                'message' => Yii::t('user', 'This username has already been taken')
            ],
            // email rules
            'emailTrim'     => ['email', 'trim'],
            'emailRequired' => ['email', 'required'],
            'emailPattern'  => ['email', 'email'],
            'emailUnique'   => [
                'email',
                'unique',
                'targetClass' => $user,
                'message' => Yii::t('user', 'This email address has already been taken')
            ],
            // password rules
            'passwordRequired' => ['password', 'required', 'skipOnEmpty' => $this->module->enableGeneratingPassword],
            'passwordLength'   => ['password', 'string', 'min' => 6, 'max' => 72],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email'    => Yii::t('user', 'Email'),
            'username' => Yii::t('user', 'Username'),
            'password' => Yii::t('user', 'Password'),
            'item_name' => Yii::t('user', 'Register As'),
        ];
    }

    public function afterSave($isNew, $old)
    {
    	if ($isNew){
	    	$model = $this->findModel($this->user->id);
	        $authAssignment = new AuthAssignment([
	            'user_id' => $model->id,
	        ]);

	        $authAssignment->load(Yii::$app->request->post());
	        // delete all role
	        AuthAssignment::deleteAll(['user_id' => $model->id]);
	        if (is_array($authAssignment->item_name)) {
	            foreach ($authAssignment->item_name as $item) {
	                if (!in_array($item, $authAssignments)) {
	                    $authAssignment2 = new AuthAssignment([
	                        'user_id' => $model->id,
	                    ]);
	                    $authAssignment2->item_name = $item;
	                    $authAssignment2->created_at = time();
	                    $authAssignment2->save();

	                    $authAssignments = AuthAssignment::find()->where([
	                        'user_id' => $model->id,
	                    ])->column();
	                }
	            }
	        }
	    }
	}

}