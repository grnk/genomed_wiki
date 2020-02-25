<?php

namespace common\models;

use common\assets\LoadedFilesAsset;
use \common\models\base\Article as BaseArticle;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "article".
 */
class Article extends BaseArticle
{

    /**
     * @var UploadedFile
     */
    public $upload_files;

    const ARTICLE_ACTIVE = 1;
    const ARTICLE_INACTIVE = 0;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
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
            'content' => 'Content',
            'status' => 'Статус активности',
            'meta_description' => 'Мета описание',
            'meta_keywords' => 'Мета ключевые слова',
            'preview_text' => 'Текст для вывода в превью статьи',
            'preview_image' => ' Изображение для вывода в превью статьи',
            'slug' => 'Уникальное название статьи',
            'upload_files' => 'Загрузить изображение для превью',
        ];
    }

    /**
     * @param $sectionId
     * @param $order
     * @return bool
     */
    public function createSectionArticle($sectionId, $order)
    {
        if(empty($sectionId)) {
            return false;
        }


        return $sectionArticle = (new SectionArticle([
            'section_id' => $sectionId,
            'article_id' => $this->id,
            'order' => $order,
        ]))->save();
    }

    /**
     * @param $post
     * @return array
     */
    public function getNewSectionArticles($post)
    {
        $sectionArticles = [];

        if(empty($post['SectionArticle'])) {
            return [];
        }

        foreach ($post['SectionArticle'] as $sectionArticle) {
                $sectionArticles[] = $sectionArticle;
        }

        return $sectionArticles;
    }

    /**
     * Удаляет все SectionArticle
     */
    public function deleteAllSectionArticle()
    {
        SectionArticle::deleteAll('article_id = ' . $this->id);
    }

    /**
     * @return string
     */
    public function getUrlArticleImagePreview()
    {
        if($this->preview_image === null) {
            return $this->getBaseUrl() . '/images/' . 'nophoto.png';
        }

        return $this->getBaseUrl() . '/article-image-preview/' . $this->preview_image;
    }

    /**
     * @return string
     */
    protected function getBaseUrl()
    {
        $assetBundle = LoadedFilesAsset::register(Yii::$app->view);

        return $assetBundle->baseUrl;
    }

    /**
     * @return array
     */
    public function getSectionsIds() {
        $sectionIds = [];
        foreach ($this->getSectionArticles()->all() as $sectionArticle) {
            $sectionIds[] = $sectionArticle->section_id;
        }

        return $sectionIds;
    }
}
