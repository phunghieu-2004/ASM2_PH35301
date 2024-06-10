<?php

namespace Acer\Asm2Ph35301\Controllers\Client;

use Acer\Asm2Ph35301\Commons\Controller;
use Acer\Asm2Ph35301\Commons\Helper;
use Acer\Asm2Ph35301\Models\Product;

class DetailsController extends Controller{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function show($id)
    {
        $product = $this->product->findByID($id);
        
        $this->renderClient('details', [
            'product' => $product
        ]);
        
    }

}