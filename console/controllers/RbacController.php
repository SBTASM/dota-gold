<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 029 29.05.17
 * Time: 14:22
 */

namespace console\controllers;


use common\dicts\ActionDict;
use common\dicts\RolesDict;

class RbacController
{
    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;

        // Create roles
        $guest  = $authManager->createRole(RolesDict::ROLE_GUEST);
        $user = $authManager->createRole(RolesDict::ROLE_USER);
        $admin  = $authManager->createRole(RolesDict::ROLE_ADMIN);

        // Create simple, based on action{$NAME} permissions
        $login  = $authManager->createPermission(ActionDict::ACTION_LOGIN);
        $logout = $authManager->createPermission(ActionDict::ACTION_LOGOUT);
        $error  = $authManager->createPermission(ActionDict::ACTION_ERROR);
        $signUp = $authManager->createPermission(ActionDict::ACTION_SIGNUP);
        $index  = $authManager->createPermission(ActionDict::ACTION_INDEX);
        $view   = $authManager->createPermission(ActionDict::ACTION_VIEW);
        $update = $authManager->createPermission(ActionDict::ACTION_UPDATE);
        $delete = $authManager->createPermission(ActionDict::ACTION_DELETE);

        // Add permissions in Yii::$app->authManager
        $authManager->add($login);
        $authManager->add($logout);
        $authManager->add($error);
        $authManager->add($signUp);
        $authManager->add($index);
        $authManager->add($view);
        $authManager->add($update);
        $authManager->add($delete);


        // Add rule, based on UserExt->group === $user->group
        $userGroupRule = new UserGroupRule();
        $authManager->add($userGroupRule);

        // Add rule "UserGroupRule" in roles
        $guest->ruleName  = $userGroupRule->name;
        $brand->ruleName  = $userGroupRule->name;
        $user->ruleName = $userGroupRule->name;
        $admin->ruleName  = $userGroupRule->name;

        // Add roles in Yii::$app->authManager
        $authManager->add($guest);
        $authManager->add($brand);
        $authManager->add($user);
        $authManager->add($admin);

        // Add permission-per-role in Yii::$app->authManager
        // Guest
        $authManager->addChild($guest, $login);
        $authManager->addChild($guest, $logout);
        $authManager->addChild($guest, $error);
        $authManager->addChild($guest, $signUp);
        $authManager->addChild($guest, $index);
        $authManager->addChild($guest, $view);

        // BRAND
        $authManager->addChild($brand, $update);
        $authManager->addChild($brand, $guest);

        // TALENT
        $authManager->addChild($user, $update);
        $authManager->addChild($user, $guest);

        // Admin
        $authManager->addChild($admin, $delete);
        $authManager->addChild($admin, $user);
        $authManager->addChild($admin, $brand);
    }
}