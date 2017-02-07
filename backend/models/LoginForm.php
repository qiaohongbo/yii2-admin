<?php
namespace backend\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model {

    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;

    public function rules() {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * 验证密码
     */
    public function validatePassword($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * 使用用户名和密码登录
     * @return boolean
     */
    public function login() {
        if ($this->validate()) {
            $model = $this->getUser();
            $isLogin = Yii::$app->user->login($model, $this->rememberMe ? 3600 * 24 * 30 : 0);
            //登录成功,记录登录时间和IP
            if($isLogin) {
                $model->last_login_time = time();
                $model->last_login_ip = ip2long(Yii::$app->getRequest()->getUserIP());
                $model->save(false);
            }
            return $isLogin;
        } else {
            return false;
        }
    }

    /**
     * 通过username查找用户
     */
    protected function getUser() {
        if ($this->_user === null) {
            $this->_user = Admin::findByUsername($this->username);
        }
        return $this->_user;
    }

}