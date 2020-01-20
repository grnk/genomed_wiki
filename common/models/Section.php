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
            [['title'], 'required'],
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

    public function getUrl()
    {
        return Url::to(['article/index', 'sectionId' => $this->id]);
    }

    public static function getItemsSectionForLeftMenu()
    {
        $items = [];
        $sections = Section::find()->orderBy('order')->all();
        foreach ($sections as $section) {
            $items[] = ['label' => $section->title, 'url' => $section->getUrl()];
        }

        return $items;
    }


}
