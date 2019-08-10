<?php

use yii\db\Migration;

/**
 * Class m190810_092842_admin_table
 */
class m190810_092842_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     *//*
    public function safeUp()
    {

    }
    */
    /**
     * {@inheritdoc}
     */
    /*
    public function safeDown()
    {
        echo "m190810_092842_admin_table cannot be reverted.\n";

        return false;
    }
    */
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
         echo "Creando tabla de admin.\n";
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable('admin', [
				'id'                    => 'int(10) unsigned auto_increment PRIMARY KEY',
				'username'              => 'varchar(255) not null',
				'email'                 => 'varchar(255) not null',
				'password_hash'         => 'varchar(255) not null',
				'status'                => 'TINYINT(4) not null default 0',
				'auth_key'              => 'varchar(32) not null',
				'password_reset_token'  => 'varchar(255) default null',
				'account_confirm_token' => 'varchar(255) default null',
				'created_at'            => 'datetime default null',
				'updated_at'            => 'datetime default null',
		], $tableOptions);
		
		$auth = Yii::$app->authManager;
		
		// add "admin" permission
		$admin= $auth->createPermission('admin');
		$admin->description = 'Admin permission';
		$auth->add($admin);
		
		// add "administrator" role and give this role the "admin" permission
		$administrator = $auth->createRole('administrator');
		$auth->add($administrator);
		$auth->addChild($administrator, $admin);
    }

    public function down()
    {
        echo "Borrando tabla de admin.\n";
        $this->dropTable('admin');
        $auth = Yii::$app->authManager;
        $auth->removeAll();	
    }
    
}
