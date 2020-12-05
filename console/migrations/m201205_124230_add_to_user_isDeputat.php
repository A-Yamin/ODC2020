<?php

use yii\db\Migration;

/**
 * Class m201205_124230_add_to_user_isDeputat
 */
class m201205_124230_add_to_user_isDeputat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}','isDeputat',$this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{$user}}','isDeputat');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201205_124230_add_to_user_isDeputat cannot be reverted.\n";

        return false;
    }
    */
}
