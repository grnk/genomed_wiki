<?php

use yii\db\Migration;

/**
 * Handles the creation of table `section`.
 */
class m200111_101335_create_section_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT "Разделы"';
        }
        $this->createTable('section', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->comment('Название раздела')->notNull(),
            'order' => $this->integer()->comment('Сортировка'),
            'parent_id' => $this->integer()->comment('Родительский раздел')->defaultValue(null),
            'status' => $this->smallInteger()->comment('Статус активности')->notNull()->defaultValue(1),
            'meta_description' => $this->string()->comment('Мета описание')->defaultValue(null),
            'meta_keywords' => $this->string()->comment('Мета ключевые слова')->defaultValue(null),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'slug' => $this->string()->comment('Уникальное название раздела')->notNull()->unique(),
        ], $tableOptions);
        $this->createIndex(
            'order_section',
            'section',
            'order'
        );
        $this->createIndex(
            'status_section',
            'section',
            'status'
        );
        $this->createIndex(
            'parent_id_section',
            'section',
            'parent_id'
        );
        $this->createIndex(
            'slug_section',
            'section',
            'slug'
        );
        $this->addForeignKey(
            'FK_section_parent_id',
            'section',
            'parent_id',
            'section',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('section');
    }
}
