<?php

namespace common\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[SectionArticle]].
 *
 * @see SectionArticle
 */
class SectionArticleQuery extends ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return SectionArticle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SectionArticle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
