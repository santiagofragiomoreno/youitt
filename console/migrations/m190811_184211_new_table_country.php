<?php

use yii\db\Migration;

/**
 * Class m190811_184211_new_table_country
 */
class m190811_184211_new_table_country extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190811_184211_new_table_country cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190811_184211_new_table_country cannot be reverted.\n";

        return false;
    }
    */
}
