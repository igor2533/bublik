<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m210615_185246_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'price' => $this->text(),
            'image' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
    }
}
