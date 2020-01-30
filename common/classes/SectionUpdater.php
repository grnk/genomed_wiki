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
        return 'sort';
    }

    private function parentUpdate()
    {
        return 'parentUpdate';
    }

    public function update()
    {
        return $this->sort() . ' ' . $this->parentUpdate();
    }
}