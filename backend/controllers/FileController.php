<?php


namespace backend\controllers;


use Yii;
use yii\web\Controller;
use yii\web\Response;

class FileController extends Controller
{
    /**
     * Сообщение об ошибке
     *
     * @var
     */
    public $msg;
    /**
     * Наличие ошибки
     *
     * @var
     */
    public $error;

    /**
     * Код ошибки
     *
     * @var int
     */
    public $error_type = 0;

    /**
     * Данные к выдаче
     *
     * @var
     */
    public $data;

    /**
     * Базовая инициализация
     */
    public function init_ajax()
    {
        $this->error = 'yes';
        $this->msg = Yii::$app->params['messages']['user']['error']['params'];
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    /**
     * Загрузка картинки через AJAX в CKEDITOR
     */
    public function actionCkeditor_image_upload() {

        $funcNum = $_REQUEST['CKEditorFuncNum'];
        $extension = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);

        $message = 'Image loading is ok';

        $name = md5(date("m-d-Y-h-i-s", time()).".".$extension);

        $folder = '/files/ckeditor_images/';
        $folder1 = '/web/files/ckeditor_images/';

        $url = Yii::$app->urlManager->createAbsoluteUrl($folder.$name);

        move_uploaded_file( $_FILES['upload']['tmp_name'], Yii::$app->basePath.$folder1.$name );

        echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$funcNum.'", "'.$url.'", "'.$message.'" );</script>';
    }

    /**
     * Сохранение картинки из буфера обмена через Ajax в CKEDITOR
     *
     * @return array
     */
    public function actionSave_screenshot()
    {

        $this->init_ajax();
        if (Yii::$app->request->isPost) {
            $array = explode(',',Yii::$app->request->post('input'));
            if (is_array($array) && isset($array[1])) {
                $file_content = base64_decode($array[1]);
                if ($file_content) {
                    $file_name = $this->getUnic_file_name().'.jpg';
                    file_put_contents(__DIR__.'/../web/files/screen/'.$file_name,$file_content, LOCK_EX );
                    $this->error = 'no';
                    $this->msg = '/files/screen/'.$file_name;
                }
            }
        }

        return $this->out();
    }

    /**
     * Генерация уникального имени по полю actual_name
     *
     * @return bool|string
     */
    public function getUnic_file_name()
    {
        $dateFile = new \DateTime();
        return md5($dateFile->format('Y-m-d H:i:s') . rand(0, 10000));
    }

    /**
     * Стандартная выдача сообщений
     *
     * @return array
     */
    public function out()
    {
        return ['error'=>$this->error, $this->error_type,'msg'=>$this->msg, 'data'=> ($this->error=='no') ? $this->data : '' ];
    }
}