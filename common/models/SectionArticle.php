<?php

namespace common\models;

use \common\models\base\SectionArticle as BaseSectionArticle;

/**
 * This is the model class for table "section_article".
 */
class SectionArticle extends BaseSectionArticle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section_id', 'article_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }
	
}
