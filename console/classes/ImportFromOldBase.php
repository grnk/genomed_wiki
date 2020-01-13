<?php


namespace console\classes;


use Yii;
use yii\db\Exception;
use yii\db\Query;
use yii\helpers\BaseInflector;

class ImportFromOldBase
{
    /**
     * @throws Exception
     */
    public function importAll()
    {
        $rows = (new Query())
            ->from('articles')
            ->all(Yii::$app->remoteDb);

        foreach ($rows as $row) {
            if($row['parentid'] === '0') {
                Yii::$app->db->createCommand()->insert('section', [
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'order' => $row['_importance'],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'slug' => BaseInflector::slug($row['title']),
                ])->execute();

                $this->importSectionArticle($row['id']);
                $this->importArticles($row['id']);
            }
        }
    }

    /**
     * @param $parentId
     * @throws Exception
     */
    protected function importArticles($parentId) {
        $articles = (new Query())
            ->from('articles')
            ->andWhere(['parentid' => $parentId])
            ->all(Yii::$app->remoteDb);

        foreach ($articles as $article) {
            $this->createArticle($article, $parentId);
        }
    }

    /**
     * @param $id
     * @throws Exception
     */
    protected function importSectionArticle($id) {
        $article = (new Query())
            ->from('articles')
            ->andWhere(['id' => $id])
            ->one(Yii::$app->remoteDb);

        $this->createArticle($article, $id);
    }

    /**
     * @param $article
     * @param $sectionId
     * @throws Exception
     */
    protected function createArticle($article, $sectionId)
    {
        Yii::$app->db->createCommand()->insert('article', [
            'id' => $article['id'],
            'title' => $article['title'],
            'date' => ($article['date'] === '0000-00-00 00:00:00') ? '2020-01-01 00:00:00' : $article['date'],
            'content' => $article['text'],
            'meta_description' => $article['meta_description'],
            'meta_keywords' => $article['meta_keywords'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'slug' => BaseInflector::slug($article['title'] . '-' . $article['id']),
        ])->execute();

        Yii::$app->db->createCommand()->insert('section_article', [
            'section_id' => $sectionId,
            'article_id' => $article['id'],
            'order' => $article['_importance'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ])->execute();
    }
}