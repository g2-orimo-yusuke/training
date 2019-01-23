<?php

namespace controller\sample;


use model\sample\NissanNote;

class test
{
    public function action()
    {
        echo NissanNote::getFormattedPrice();

    }
}