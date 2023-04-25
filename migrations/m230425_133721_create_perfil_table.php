<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%perfil}}`.
 */
class m230425_133721_create_perfil_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%perfil}}', [
            'id' => $this->primaryKey(),
            'description' => $this->string()->notNull(),
            'client_id' => $this->integer(),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s'))
        ]);

        // add foreign key for table `client`
        $this->addForeignKey(
            'fk-perfil-client-client_id',
            'perfil',
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
        $this->dropForeignKey('fk-perfil-client-client_id', 'perfil');
        $this->dropTable('{{%perfil}}');
    }
}
