<?php

namespace controller;

use classes\util;
use classes\view;

class edit
{

    public function action()
    {
        $editModel = new \model\edit();
        $result = $editModel->logic();

        $message = '';

        $vieOutPut = new view();
        echo $vieOutPut->outPutViewEdit($result, $message);

        if (util::isExistsInputParam('change')) {
            $editModel->changeHuman($result['id']);
        }

        if (util::isExistsInputParam('delete')) {
            $editModel->deleteHuman($result['id']);
        }

    }
}

$editController = new edit();
$editController->action();