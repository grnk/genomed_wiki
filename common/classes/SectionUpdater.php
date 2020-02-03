<?php

namespace common\classes;

use common\models\Section;

class SectionUpdater
{
    private $parentId;
    private $items = [];

    /**
     * SectionUpdater constructor.
     * @param $parentId
     * @param array $items
     */
    public function __construct($parentId, array $items)
    {
        $this->parentId = $parentId;
        $this->items = $items;
    }

    private function sort()
    {
        $order = 100;
        foreach ($this->items as $sectionId) {
            $modelSection = Section::find()->andWhere(['id' => $sectionId])->one();
            $modelSection->order = $order;
            $modelSection->update();
            $order += 100;
        }
    }

    private function parentUpdate()
    {
        foreach ($this->items as $sectionId) {
            $modelSection = Section::find()->andWhere(['id' => $sectionId])->one();
            $modelSection->parent_id = $this->parentId;
            $modelSection->update();
        }
    }

    public function update()
    {
        $this->parentUpdate();
        $this->sort();
    }
}