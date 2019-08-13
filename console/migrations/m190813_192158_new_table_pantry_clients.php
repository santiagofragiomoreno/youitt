<?php

use yii\db\Migration;

/**
 * Class m190813_192158_new_table_pantry_clients
 */
class m190813_192158_new_table_pantry_clients extends Migration
{
     
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        echo "Creando la Tabla de despensas clientes.\n";
                $tableOptions = null;
                if($this->db->driverName ==='mysql'){
                    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                }
                $this->createTable('pantry_clients', [
                    'id'                            => 'int(10) unsigned auto_increment PRIMARY KEY',
                    'client_id'                     => 'int(10) not null',
                    'pantry_identification_code'    => 'varchar(255) not null',
                    'created_at'                    => 'datetime default null',
                ], $tableOptions);
    }

    public function down()
    {
        echo "Borrando tabla de despensas clientes.\n";
        $this->dropTable('pantry_clients');
    }
}
