<?php

namespace frontend\models\searches;

use common\models\Section;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Article;

/**
 * common\models\search\ArticleSearch represents the model behind the search form about `common\models\Article`.
 */
 class ArticleSearch extends Article
{
     /**
      * @var Section
      */
    public $section;
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
        if($this->section->getLevel() === 3) {
            $query = $this->section->getArticles();
        } else {
            $query = Article::find()
                ->distinct()
                ->andWhere([
                    'id' => $this->articleIds(
                        $this->section,
                        $this->section->getArticles()->select(['id'])->column()
                    )
                ]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        return $dataProvider;
    }

     /**
      * @param $model Section
      */
    private function articleIds($model, $ids = [])
    {
        foreach ($model->sections as $section) {
            $ids = array_merge(
                $ids,
                $section
                    ->getArticles()
                    ->select('id')
                    ->column()
            );
        }
//        dd($ids);
        return $ids;
    }
}
