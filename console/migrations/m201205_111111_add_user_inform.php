<?php

use yii\db\Migration;

/**
 * Class m201205_111111_add_user_inform
 */
class m201205_111111_add_user_inform extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('user_party_id_ix', '{{%user}}', 'part_id');

        $this->addForeignKey('user_party_id_fk', '{{%user}}', 'part_id', '{{%party}}', 'id', 'cascade','cascade');

        $this->createIndex('user_region_id_ix', '{{%user}}', 'region_id');

        $this->addForeignKey('user_region_id_fk', '{{%user}}', 'region_id', '{{%regions}}', 'id', 'cascade','cascade');

        $this->insert('{{%user}}', [
            'firstname' => "Admin",
            'secount_name' => "Adminov",
            'last_name' => "Adminovich",
            'sex' => "Erkak",
            'jshsh' => "316099866100271111",
            'seriesParport' => "AA3434435",
            'birth_date' => "19980916",
            'email' => "admin@gmail.com",
            'phone' => "998933334455",
            'part_id' => 1,
            'region_id' => 1,
            'photo' => "admin.jpg",
            'status' => 10,
            'password_hash' => Yii::$app->security->generatePasswordHash('password'),
            'password_reset_token' => NULL,
            'auth_key' => Yii::$app->security->generateRandomString(),
            'created_at' => time(),
            'updated_at' => time(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201205_111111_add_user_inform cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201205_111111_add_user_inform cannot be reverted.\n";

        return false;
    }
    */
}
