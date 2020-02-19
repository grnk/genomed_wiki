<?php

namespace frontend\widgets;

use common\classes\MainMenu;
use common\models\Section;
use Yii;

class FrontendleftMenu extends MainMenu
{
    public function run()
    {
        FrontendLeftMenuAsset::register($this->view);

        parent::run();
    }

    public function init()
    {
        parent::init();

        $this->items = $this->getItems();
    }

    public function getItems()
    {
        $params = Yii::$app->request->queryParams;
        $level = null;
        if(isset($params['sectionId'])) {
            $section = Section::findOne(['id' => $params['sectionId']]);
            $level = $section->getLevel();
        }
        d($level);

        if($level < 3) {
            return Section::getItemsSectionForFrontendLeftMenu($params['sectionId']);
        }

        if($level === 3) {
            $section = Section::findOne(['id' => $params['sectionId']]);

            return Section::getItemsSectionForFrontendLeftMenu($section->parent_id);
        }

        return [];
    }

}