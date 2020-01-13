<?php

namespace common\models\base;

use common\models\SectionQuery;
use mootensai\relation\RelationTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the base model class for table "section".
 *
 * @property integer $id
 * @property string $title
 * @property integer $order
 * @property integer $parent_id
 * @property integer $status
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $created_at
 * @property string $updated_at
 * @property string $slug
 *
 * @property \common\models\Section $parent
 * @property \common\models\Section[] $sections
 * @property \common\models\SectionArticle[] $sectionArticles
 */
class Section extends ActiveRecord
{

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'parent',
            'sections',
            'sectionArticles'
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
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
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(\common\models\Section::className(), ['id' => 'parent_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(\common\models\Section::className(), ['parent_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSectionArticles()
    {
        return $this->hasMany(\common\models\SectionArticle::className(), ['section_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return SectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SectionQuery(get_called_class());
    }
}
