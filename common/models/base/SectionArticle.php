<?php

namespace common\models\base;

use common\models\SectionArticleQuery;
use mootensai\relation\RelationTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the base model class for table "section_article".
 *
 * @property integer $id
 * @property integer $section_id
 * @property integer $article_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \common\models\Article $article
 * @property \common\models\Section $section
 */
class SectionArticle extends ActiveRecord
{

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'article',
            'section'
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'section_article';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'section_id' => Yii::t('app', 'id раздела'),
            'article_id' => Yii::t('app', 'id статьи'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(\common\models\Article::className(), ['id' => 'article_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(\common\models\Section::className(), ['id' => 'section_id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return SectionArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SectionArticleQuery(get_called_class());
    }
}
