<?php


namespace console\classes;


use common\models\Article;
use yii\db\Query;
use Yii;

class ChangeLinksInContent
{
    private $search;
    private $replace;
    private $changedArticlesIds;

    public function __construct()
    {
        $this->search = [
            'src="' . Yii::$app->params['protocolBackend'] . '://' . Yii::$app->params['hostOldBackend'],
            "src='" . Yii::$app->params['protocolBackend'] . '://' . Yii::$app->params['hostOldBackend'],
        ];
        $this->replace = [
            'src="' . Yii::$app->params['protocolBackend'] . '://' . Yii::$app->params['hostBackend'],
            "src='" . Yii::$app->params['protocolBackend'] . '://' . Yii::$app->params['hostBackend'],
        ];
    }

    public function run()
    {
        foreach ($this->query()->all() as $row) {
            $content = $this->changedLinks($row['content']);
            if($row['content'] !== $content) {
                $this->save($row['id'], $content);
                $this->changedArticlesIds[] = $row['id'];
            }
        }

        var_dump($this->changedArticlesIds);
    }

    private function query()
    {
        $query = new Query();
        $query->select(['id', 'content'])
            ->from('article');

        return $query;
    }

    private function changedLinks($content)
    {
        return str_replace($this->search, $this->replace, $content);
    }

    private function save($id, $content)
    {
        $model = Article::findOne($id);
        if($model === null) {
            return false;
        }
        $model->content = $content;

        return $model->save();
    }
}