<?php
/**
 * Created by PhpStorm.
 * User: orimo.yusuke
 * Date: 2019-01-17
 * Time: 20:02
 */

namespace classes;


use Iterator;

class idLinkAddIterator extends \FilterIterator
{
    public function __construct(Iterator $iterator)
    {
        parent::__construct($iterator);
    }

    public function accept()
    {
        return true;
//        if ($key == 'id'){
//            echo '<td><a href="/public/index.php?c=human/edit&id=' . $key . ' ">' .  . '</a></td>';
//        }
    }
}