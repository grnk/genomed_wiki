<?php

use yii\db\Migration;

/**
 * Handles the creation of table `section_article`.
 */
class m200111_155419_create_section_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT "Разделы и статьи"';
        }
        $this->createTable('section_article', [
            'id' => $this->primaryKey(),
            'section_id' => $this->integer()->comment('id раздела')->defaultValue(null),
            'article_id' => $this->integer()->comment('id статьи')->defaultValue(null),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);
        $this->addForeignKey(
            'FK_section_id',
            'section_article',
            'section_id',
            'section',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'FK_article_id',
            'section_article',
            'article_id',
            'article',
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
        $this->dropTable('section_article');
    }
}
