<?php
/**
 * 控制过滤器, 集成了RBAC菜单权限验证
 * @author 边走边乔 <771405950>
 */
namespace backend\components;

use Yii;
use yii\web\User;
use yii\di\Instance;
use yii\web\ForbiddenHttpException;

//class AccessControl extends \yii\base\ActionFilter {
class AccessControl extends \yii\filters\AccessControl {

    /**
     * This method is invoked right before an action is to be executed (after all possible filters.)
     * You may override this method to do last-minute preparation for the action.
     * @param Action $action the action to be executed.
     * @return boolean whether the action should continue to be executed.
     */
    public function beforeAction($action)
    {
        $user = $this->user;
        //-----菜单权限检查-----
        $actionId = $action->getUniqueId();
        foreach ($this->rules as $i => $rule) {
            if(in_array($action->id, $rule->actions)) break;
            /*if(Yii::$app->user->identity->username == 'admin') {
                $this->rules[] = Yii::createObject(array_merge($this->ruleConfig, [
                    'actions' => [$action->id],
                    'allow' => true,
                ]));
            } else*/if (!Yii::$app->user->can($actionId)) {
                $this->rules[] = Yii::createObject(array_merge($this->ruleConfig, [
                    'actions' => [$action->id],
                    'allow' => false,
                ]));
            } else {
                $this->rules[] = Yii::createObject(array_merge($this->ruleConfig, [
                    'actions' => [$action->id],
                    'allow' => true,
                ]));
            }
        }
        //----------
        $request = Yii::$app->getRequest();
        /* @var $rule AccessRule */
        foreach ($this->rules as $rule) {
            if ($allow = $rule->allows($action, $user, $request)) {
                return true;
            } elseif ($allow === false) {
                if (isset($rule->denyCallback)) {
                    call_user_func($rule->denyCallback, $rule, $action);
                } elseif ($this->denyCallback !== null) {
                    call_user_func($this->denyCallback, $rule, $action);
                } else {
                    $this->denyAccess($user);
                }
                return false;
            }
        }
        if ($this->denyCallback !== null) {
            call_user_func($this->denyCallback, null, $action);
        } else {
            $this->denyAccess($user);
        }
        return false;
    }

}