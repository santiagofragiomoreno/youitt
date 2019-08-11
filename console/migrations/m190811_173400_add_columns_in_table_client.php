<?php

use yii\db\Migration;

/**
 * Class m190811_173400_add_columns_in_table_client
 */
class m190811_173400_add_columns_in_table_client extends Migration
{
    
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        echo "Creando nuevas columnas para la tabla Client.\n";
        
        $this->addColumn('client', 'address', 'VARCHAR (255) not null after `phone`');
        $this->addColumn('client', 'postal_code', 'INT (5) not null after `address`');
        $this->addColumn('client', 'province', 'VARCHAR (255) not null after `postal_code`');
        $this->addColumn('client', 'country_code', 'VARCHAR (255) not null after `province`');
        $this->addColumn('client', 'pantry_id', 'INT (20) not null after `id`');
    }

    public function down()
    {
        echo "Borrando nuevas columnas de la tabla Client.\n";

        $this->dropColumn('client', 'address');
        $this->dropColumn('client', 'postal_code');
        $this->dropColumn('client', 'province');
        $this->dropColumn('client', 'country_code');
        $this->dropColumn('client', 'pantry_id');
    }
    
}
