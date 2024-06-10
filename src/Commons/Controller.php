<?php

namespace Acer\Asm2Ph35301\Commons;
use eftec\bladeone\BladeOne;

class Controller{
    public function renderClient($view, $data = []){
        $templatePath = __DIR__.'/../Views/Client';
        $compiledPath = __DIR__.'/../Views/compiles';
        $blade = new BladeOne($templatePath,$compiledPath);


        
        echo $blade -> run($view,$data);
    }
    public function renderAdmin($view, $data= []){
        $templatePath = __DIR__.'/../Views/Admin';
        $compiledPath = __DIR__.'/../Views/compiles';
        $blade = new BladeOne($templatePath,$compiledPath);


        
        echo $blade -> run($view,$data);
    }
}