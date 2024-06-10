<?php

namespace Acer\Asm2Ph35301\Controllers\Admin;

use Acer\Asm2Ph35301\Commons\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $this->renderAdmin(__FUNCTION__);
    }
}
