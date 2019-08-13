<?php

use yii\db\Migration;

/**
 * Class m190813_190830_new_table_client_products
 */
class m190813_190830_new_table_client_products extends Migration
{
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        echo "Creando la Tabla de productos cliente.\n";
                $tableOptions = null;
                if($this->db->driverName ==='mysql'){
                    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                }
                $this->createTable('client_products', [
                    'id'                      => 'int(10) unsigned auto_increment PRIMARY KEY',
                    'client_id'               => 'int(10) not null',
                    'product_code'            => 'varchar(20) not null',
                    'product_name'            => 'varchar(250) not null',
                    'product_quantity'        => 'float not null',
                ], $tableOptions);
    }

    public function down()
    {
        echo "Borrando tabla de productos clientes.\n";
        $this->dropTable('client_products');
    }
}
