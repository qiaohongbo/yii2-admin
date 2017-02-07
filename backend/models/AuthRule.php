<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\rbac\Rule;

class AuthRule extends Rule {

    public $name;

    private $_rule;

    /**
     * Executes the rule.
     *
     * @param string|integer $user the user ID. This should be either an integer or a string representing
     * the unique identifier of a user. See [[\yii\web\User::id]].
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to [[ManagerInterface::checkAccess()]].
     * @return boolean a value indicating whether the rule permits the auth item it is associated with.
     */
    public function execute($user, $item, $params) {
        //var_dump($user);
        //var_dump($item);
        //var_dump($params);
        return true;
    }

    /**
     * 获取rule
     * @param  [string] $name
     * @return [object]
     */
    public function getRule($name) {
        $this->_rule = Yii::$app->authManager->getRule($name);
        return $this->_rule;
    }

    public function save() {
        $authManager = Yii::$app->authManager;
        $this->_rule = $authManager->getRule($this->name);
        if($this->_rule !== null) {
            $isNew = false;
            $oldName = $this->_rule->name;
        } else {
            $isNew = true;
            $this->_rule = $this;
        }
        $this->_rule->name = $this->name;
        if($isNew) $authManager->add($this->_rule);
        else $authManager->update($oldName, $this->_rule);
        //Helper::invalidate();
        return true;
    }

}