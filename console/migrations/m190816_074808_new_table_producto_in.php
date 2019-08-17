<?php

use yii\db\Migration;

/**
 * Class m190816_074808_new_table_producto_in
 */
class m190816_074808_new_table_producto_in extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        echo "Creando la Tabla de pdroduct_in.\n";
                $tableOptions = null;
                if($this->db->driverName ==='mysql'){
                    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                }
                $this->createTable('product_in', [
                    'id'                            => 'int(10) unsigned auto_increment PRIMARY KEY',
                    'pantry_clients_id'             => 'int(10) not null',
                    'client_id'                     => 'int(10) not null',
                    'productos_codigo'              => 'varchar(20) not null',
                    'productos_peso_producto'       => 'float default null',
                    'created_at'                    => 'datetime default null',
                ], $tableOptions);
    }

    public function down()
    {
        echo "Borrando tabla de despensas clientes.\n";
        $this->dropTable('product_in');
    }
}
