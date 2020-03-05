<?php

namespace common\models\search;

use common\models\Section;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Article;

/**
 * common\models\search\ArticleSearch represents the model behind the search form about `common\models\Article`.
 */
 class ArticleSearchMain extends Article
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['title', 'date', 'content', 'meta_description', 'meta_keywords', 'preview_text', 'preview_image', 'created_at', 'updated_at', 'slug'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::find()->orderBy('updated_at DESC')->limit(12);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        return $dataProvider;
    }
}
