<?php


namespace frontend\widgets;


use yii\base\Widget;

class MainBlock extends  Widget
{
    public $leftMenu;
    public $content;
    public $isMainPage;

    public function run()
    {
        parent::run();

        if($this->isMainPage) {
            return $this->render('main-block-main-page', [
                'leftMenu' => $this->leftMenu,
                'content' => $this->content,
            ]);
        }

        return $this->render('main-block', [
            'leftMenu' => $this->leftMenu,
            'content' => $this->content,
        ]);
    }
}