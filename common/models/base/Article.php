<?php

namespace common\models\base;

use common\models\ArticleQuery;
use mootensai\relation\RelationTrait;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use Yii;

/**
 * This is the base model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $date
 * @property integer $order
 * @property string $content
 * @property integer $status
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $preview_text
 * @property string $preview_image
 * @property string $created_at
 * @property string $updated_at
 * @property string $slug
 *
 * @property \common\models\SectionArticle[] $sectionArticles
 */
class Article extends ActiveRecord
{
    use RelationTrait;

    private $_rt_softdelete;
    private $_rt_softrestore;

    public function __construct(){
        parent::__construct();
        $this->_rt_softdelete = [
            'deleted_by' => Yii::$app->user->id,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
        $this->_rt_softrestore = [
            'deleted_by' => 0,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
    }

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'sectionArticles'
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     *
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock
     *
     */
    public function optimisticLock() {
        return 'lock';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSectionArticles()
    {
        return $this->hasMany(\common\models\SectionArticle::className(), ['article_id' => 'id']);
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
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }

    /**
     * The following code shows how to apply a default condition for all queries:
     *
     * ```php
     * class Customer extends ActiveRecord
     * {
     *     public static function find()
     *     {
     *         return parent::find()->where(['deleted' => false]);
     *     }
     * }
     *
     * // Use andWhere()/orWhere() to apply the default condition
     * // SELECT FROM customer WHERE `deleted`=:deleted AND age>30
     * $customers = Customer::find()->andWhere('age>30')->all();
     *
     * // Use where() to ignore the default condition
     * // SELECT FROM customer WHERE age>30
     * $customers = Customer::find()->where('age>30')->all();
     * ```
     */

    /**
     * @inheritdoc
     * @return ArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new ArticleQuery(get_called_class());
        return $query->where(['article.deleted_by' => 0]);
    }
}
