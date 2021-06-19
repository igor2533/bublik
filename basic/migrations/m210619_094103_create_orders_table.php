<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m210619_094103_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->string()->notNull(),
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
        $this->dropTable('{{%orders}}');
    }
}
