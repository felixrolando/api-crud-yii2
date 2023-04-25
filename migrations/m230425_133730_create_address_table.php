<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%address}}`.
 */
class m230425_133730_create_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%address}}', [
            'id' => $this->primaryKey(),
            'country' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'street' => $this->string()->notNull(),
            'zip_code' => $this->string()->null(),
            'is_default' => $this->boolean(),
            'client_id' => $this->integer(),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s'))
        ]);

        // add foreign key for table `client`
        $this->addForeignKey(
            'fk-address-client-client_id',
            'address',
            'client_id',
            'client',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-address-client-client_id', 'address');
        $this->dropTable('{{%address}}');
    }
}
