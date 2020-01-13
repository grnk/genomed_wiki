<?php

use yii\db\Migration;
use yii\db\Query;
use yii\helpers\BaseInflector;

/**
 * Class m200112_222258_seeding_from_the_old_base
 */
class m200112_222258_seeding_from_the_old_base extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $rows = (new Query())
            ->from('articles')
            ->all(Yii::$app->remoteDb);

        foreach ($rows as $row) {
            if($row['parentid'] === '0') {
                $this->insert('section', [
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'order' => $row['_importance'],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'slug' => BaseInflector::slug($row['title']),
                ]);
            } else {
                continue;
            }
        }

        foreach ($rows as $row) {
            if($row['parentid'] !== '0') {
                $this->insert('article', [
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'date' => ($row['date'] === '0000-00-00 00:00:00') ? '2020-01-01 00:00:00' : $row['date'],
                    'content' => $row['text'],
                    'order' => $row['_importance'],
                    'meta_description' => $row['meta_description'],
                    'meta_keywords' => $row['meta_keywords'],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'slug' => BaseInflector::slug($row['title'] . '-' . $row['id']),
                ]);
//                $this->insert('section_article', [
//                    'section_id' => $row['parentid'],
//                    'article_id' => $row['id'],
//                    'created_at' => date("Y-m-d H:i:s"),
//                    'updated_at' => date("Y-m-d H:i:s"),
//                ]);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200112_222258_seeding_from_the_old_base cannot be reverted.\n";

        return false;
    }
}
