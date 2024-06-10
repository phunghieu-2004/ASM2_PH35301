<?php

namespace Acer\Asm2Ph35301\Commons;

class Helper{
    public static function debug($data){
        echo '<pre>';
        print_r($data);
        
        exit;
    }
}