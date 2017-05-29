<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 029 29.05.17
 * Time: 14:34
 */

namespace common\rbac;


use yii\rbac\Rule;

class UserGroupRule extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
{
    if (!\Yii::$app->user->isGuest) {

    }
    return true;
}
}