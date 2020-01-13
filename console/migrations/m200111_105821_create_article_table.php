<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m200111_105821_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT "Статьи"';
        }
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->comment('Название статьи')->notNull(),
            'date' => $this->dateTime()->comment('Выводимое время'),
            'content' => 'LONGTEXT',
            'status' => $this->smallInteger()->comment('Статус активности')->notNull()->defaultValue(1),
            'meta_description' => $this->string()->comment('Мета описание')->defaultValue(null),
            'meta_keywords' => $this->string()->comment('Мета ключевые слова')->defaultValue(null),
            'preview_text' => $this->text()->comment('Текст для вывода в превью статьи'),
            'preview_image' => $this->text()->comment(' Изображение для вывода в превью статьи'),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'slug' => $this->string()->comment('Уникальное название статьи')->notNull()->unique(),
        ], $tableOptions);
        $this->createIndex(
            'status_article',
            'article',
            'status'
        );
        $this->createIndex(
            'slug_article',
            'article',
            'slug'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article');
    }
}
