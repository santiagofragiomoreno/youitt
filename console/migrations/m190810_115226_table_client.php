<?php

use yii\db\Migration;

/**
 * Class m190810_115226_table_client
 */
class m190810_115226_table_client extends Migration
{
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        echo "Creando la Tabla de Cliemtes.\n";
        $tableOptions = null;
        if($this->db->driverName ==='mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('client', [
            'id'                    => 'int(10) unsigned auto_increment PRIMARY KEY',
            'username'              => 'varchar(255) not null',
            'surname'               => 'varchar(255) not null',
            'email'                 => 'varchar(255) not null',
            'phone'                 => 'varchar(25)not null',
            'password_hash'         => 'varchar(255) not null',
            'status'                => 'TINYINT(4) not null default 0',
            'auth_key'              => 'varchar(32) not null',
            'password_reset_token'  => 'varchar(255) default null',
            'account_confirm_token' => 'varchar(255) default null',
            'created_at'            => 'datetime default null',
            'updated_at'            => 'datetime default null',
        ], $tableOptions);
        
    }

    public function down()
    {
        echo "Borrando tabla de clientes.\n";
        $this->dropTable('client');
    }
    
}
