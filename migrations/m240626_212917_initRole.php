<?php

use yii\db\Migration;

/**
 * Class m240626_212917_initRole
 */
class m240626_212917_initRole extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $added = $auth->createPermission('creator');
        $added->description = 'Добавление товаров';
        $auth->add($added);

        $edit = $auth->createPermission('editor');
        $edit->description = 'изменение товаров';
        $auth->add($edit);

        $delete = $auth->createPermission('delitor');
        $delete->description = 'удаление товаров';
        $auth->add($delete);

        $admin = $auth->createRole('admin');
        $admin->description = 'роль админа';
        $auth->add($admin);
        $auth->addChild($admin, $added);
        $auth->addChild($admin, $edit);
        $auth->addChild($admin, $delete);

        $user = $auth->createRole('user');
        $user->description = 'рядовой юзер';
        $auth->add($user);

        $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240626_212917_initRole cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240626_212917_initRole cannot be reverted.\n";

        return false;
    }
    */
}
