<?php

namespace controller\sample;


use model\sample\NissanNote;

class test
{
    public function action()
    {
//        echo NissanNote::getFormattedPrice();
        echo (int)ceil(100 * 1.2 * 1);
//        $s = 'controller\\sample\\test';
//        $incetance = new $s;
//        $incetance->action();
    }
}