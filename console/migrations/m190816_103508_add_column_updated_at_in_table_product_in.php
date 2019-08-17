<?php

use yii\db\Migration;

/**
 * Class m190816_103508_add_column_updated_at_in_table_product_in
 */
class m190816_103508_add_column_updated_at_in_table_product_in extends Migration
{
   
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('product_in', 'updated_at', 'datetime default null');
    }

    public function down()
    {
        $this->dropColumn('product_in', 'updated_at');
    }
    
}
