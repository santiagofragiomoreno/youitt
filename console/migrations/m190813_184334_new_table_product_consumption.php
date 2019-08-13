<?php

use yii\db\Migration;

/**
 * Class m190813_184334_new_table_product_consumption
 */
class m190813_184334_new_table_product_consumption extends Migration
{
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        echo "Creando la Tabla de consumo de productos.\n";
                $tableOptions = null;
                if($this->db->driverName ==='mysql'){
                    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                }
                $this->createTable('product_consumption', [
                    'id'                      => 'int(10) unsigned auto_increment PRIMARY KEY',
                    'product_id'              => 'int(10) not null',
                    'client_id'               => 'int(10) not null',
                    'date_consumption'        => 'datetime default null',
                    'year'                    => 'int(10) not null',
                    'month'                   => 'int(10) not null',
                    'day'                     => 'int(10) not null',
                    'hour'                    => 'int(10) not null',
                    'minutes'                 => 'int(10) not null',
                    'second'                  => 'int(10) not null',
                    'quantity_consumption'    => 'DOUBLE not null',
                ], $tableOptions);
    }

    public function down()
    {
        echo "Borrando tabla de consumo de productos.\n";
        $this->dropTable('product_consumption');
    }
    
}
