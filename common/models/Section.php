<?php

namespace common\models;

use Yii;
use \common\models\base\Section as BaseSection;

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
        return array_replace_recursive(parent::rules(),
	    [
            [['title', 'created_at', 'updated_at', 'slug'], 'required'],
            [['order', 'parent_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'meta_description', 'meta_keywords', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
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
}
