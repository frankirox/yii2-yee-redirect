<?php

use yii\db\Migration;

class m160604_220221_redirect_table extends Migration
{

    const TABLE_NAME = '{{%redirect}}';

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'slug' => $this->string(127)->notNull(),
            'url' => $this->string(255)->notNull(),
            'status_code' => $this->integer(),
            'created_by' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey('fk_redirect_created_by', self::TABLE_NAME, ['created_by'], '{{%user}}', ['id'], 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_redirect_updated_by', self::TABLE_NAME, ['updated_by'], '{{%user}}', ['id'], 'SET NULL', 'CASCADE');

        $this->createIndex('idx_redirect_slug', self::TABLE_NAME, 'slug', true);
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_redirect_created_by', self::TABLE_NAME);
        $this->dropForeignKey('fk_redirect_updated_by', self::TABLE_NAME);

        $this->dropTable(self::TABLE_NAME);
    }

}
