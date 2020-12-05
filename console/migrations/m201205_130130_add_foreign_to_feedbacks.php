<?php

use yii\db\Migration;

/**
 * Class m201205_130130_add_foreign_to_feedbacks
 */
class m201205_130130_add_foreign_to_feedbacks extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('feedback_category_id_ix', '{{%feedbacks}}', 'category_id');

        $this->addForeignKey('feedback_category_id_fk', '{{%feedbacks}}', 'category_id', '{{%categories}}', 'id', 'cascade', 'cascade');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('feedback_category_id_fk', '{{%feedbacks}}');

        $this->dropIndex('feedback_category_id_ix', '{{%feedbacks}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201205_130130_add_foreign_to_feedbacks cannot be reverted.\n";

        return false;
    }
    */
}
