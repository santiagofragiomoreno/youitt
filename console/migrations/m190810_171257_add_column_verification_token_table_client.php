<?php

use yii\db\Migration;

/**
 * Class m190810_171257_add_column_verification_token_table_client
 */
class m190810_171257_add_column_verification_token_table_client extends Migration
{
  
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('client', 'verification_token', 'VARCHAR(255) default null');
    }

    public function down()
    {
        $this->dropColumn('client', 'verification_token');
    }
    
}
