<?php

namespace common\models;

use Yii;
use \common\models\base\Section as BaseSection;
use yii\helpers\Url;

/**
 * This is the model class for table "section".
 */
class Section extends BaseSection
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            [['order', 'parent_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Название раздела'),
            'order' => Yii::t('app', 'Сортировка'),
            'parent_id' => Yii::t('app', 'Родительский раздел'),
            'status' => Yii::t('app', 'Статус активности'),
            'meta_description' => Yii::t('app', 'Мета описание'),
            'meta_keywords' => Yii::t('app', 'Мета ключевые слова'),
            'slug' => Yii::t('app', 'Уникальное название раздела'),
        ];
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return Url::to(['article/index', 'sectionId' => $this->id]);
    }

    /**
     * @return array
     */
    public static function getItemsSectionForLeftMenu()
    {
        $items = [];
        $sections = Section::find()->orderBy('order')->all();
        foreach ($sections as $section) {
            $items[] = ['label' => $section->title, 'url' => $section->getUrl()];
        }

        return $items;
    }

    /**
     * @param null $parent_id
     * @param int $level
     * @return array
     */
    public static function getItemsSectionForMainMenu($parent_id = null, $level = 1)
    {
        $items = [];
        $sections = Section::find()
            ->orderBy('order')
            ->andWhere(['parent_id' => $parent_id])
            ->all();
        foreach ($sections as $section) {
            $items[] = [
                'label' => $section->title,
                'url' => $section->getUrl(),
                'items' => static::getItemsSectionForMainMenu($section->id, $level + 1),
                'options' => ['data-level' => $level],
            ];
        }

        return $items;
    }

    public static function getItemsSectionForMenuRedactor($parent_id = null, $level = 1)
    {
        $items = [];
        $sections = Section::find()
            ->orderBy('order')
            ->andWhere(['parent_id' => $parent_id])
            ->all();
        foreach ($sections as $section) {
            $items[] = [
                'id' => $section->id,
                'title' => $section->title,
                'order' => $section->order,
                'parentId' => $section->parent_id,
                'items' => static::getItemsSectionForMenuRedactor($section->id, $level + 1),
                'level' =>  $level,
            ];
        }

        return $items;
    }

    /**
     * Удаляет все SectionArticle
     */
    public function deleteAllSectionArticle()
    {
        SectionArticle::deleteAll('section_id = ' . $this->id);
    }

    /**
     * @param $post
     * @return array
     */
    public function getNewSectionArticles($post)
    {
        $sectionArticles = [];

        if (empty($post['SectionArticle'])) {
            return [];
        }

        foreach ($post['SectionArticle'] as $sectionArticle) {
            $sectionArticles[] = $sectionArticle;
        }

        return $sectionArticles;
    }

    /**
     * @param $articleId
     * @param $order
     * @return bool
     */
    public function createSectionArticle($articleId, $order)
    {
        if(empty($articleId)) {
            return false;
        }


        return $sectionArticle = (new SectionArticle([
            'section_id' => $this->id,
            'article_id' => $articleId,
            'order' => $order,
        ]))->save();
    }

    public function getParentTitle()
    {
        if($this->parent_id === null) {
            return 'Main';
        }
        $parentSection = Section::findOne(['id' => $this->parent_id]);

        return $parentSection->title;
    }
}
