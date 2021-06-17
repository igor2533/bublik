<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%response}}`.
 */
class m210617_115028_create_response_table extends Migration
{
 /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%response}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->string()->notNull(),
            'id_request' => $this->text(),
            'freelancer_id' => $this->text(),
            'title' => $this->text(),
            'description' => $this->text(),
            'date' => $this->text(),
            'price' => $this->text(),
            'timing' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%response}}');
    }
}




