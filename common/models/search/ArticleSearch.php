<?php

namespace common\models\search;

use common\models\Section;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Article;

/**
 * common\models\search\ArticleSearch represents the model behind the search form about `common\models\Article`.
 */
 class ArticleSearch extends Article
{
    public $sectionId;
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

        $section = Section::find()->andWhere(['id' => $this->sectionId])->one();
//        $query = Article::find();
        $query = $section->getArticles();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords])
            ->andFilterWhere(['like', 'preview_text', $this->preview_text])
            ->andFilterWhere(['like', 'preview_image', $this->preview_image])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }

     /**
      * @param $params
      * @return ActiveDataProvider
      */
     public function searchArticles($params)
     {
        $query = Article::find();

         $dataProvider = new ActiveDataProvider([
             'query' => $query,
         ]);

         $this->load($params);

         if (!$this->validate()) {
             // uncomment the following line if you do not want to return any records when validation fails
             // $query->where('0=1');
             return $dataProvider;
         }

         $query->andFilterWhere([
             'id' => $this->id,
             'status' => $this->status,
         ]);

         $query->andFilterWhere(['like', 'title', $this->title])
             ->andFilterWhere(['like', 'content', $this->content])
             ->andFilterWhere(['like', 'meta_description', $this->meta_description])
             ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords])
             ->andFilterWhere(['like', 'preview_text', $this->preview_text])
             ->andFilterWhere(['like', 'preview_image', $this->preview_image])
             ->andFilterWhere(['like', 'created_at', $this->created_at])
             ->andFilterWhere(['like', 'updated_at', $this->updated_at])
             ->andFilterWhere(['like', 'date', $this->date])
             ->andFilterWhere(['like', 'slug', $this->slug]);

         return $dataProvider;
     }
}
