<?php


namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ExampleController extends BaseController
{
    public function test()
    {
        echo app()->version();
        echo 123;die;
    }

    public function getList()
    {
        echo app()->version();
    }

}
