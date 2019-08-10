<?php

use yii\db\Migration;

/**
 * Class m190810_094230_verification_token
 */
class m190810_094230_verification_token extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'verification_token', $this->string()->defaultValue(null));
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'verification_token');
    }
}
