<?php

namespace common\models;

use \common\models\base\Article as BaseArticle;

/**
 * This is the model class for table "article".
 */
class Article extends BaseArticle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['order', 'status'], 'integer'],
            [['content', 'preview_text', 'preview_image'], 'string'],
            [['title', 'meta_description', 'meta_keywords', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => 'ID',
            'title' => 'Название статьи',
            'date' => 'Выводимое время',
            'order' => 'Сортировка',
            'content' => 'Content',
            'status' => 'Статус активности',
            'meta_description' => 'Мета описание',
            'meta_keywords' => 'Мета ключевые слова',
            'preview_text' => 'Текст для вывода в превью статьи',
            'preview_image' => ' Изображение для вывода в превью статьи',
            'slug' => 'Уникальное название статьи',
        ];
    }
}
