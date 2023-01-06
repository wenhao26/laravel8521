<?php


namespace App\Http\Controllers\v1;

use Illuminate\Routing\Controller as BaseController;

class ExampleController extends BaseController
{
    public function getList()
    {
        dd('LIST');
    }

    public function getInfo()
    {
        dd('INFO');
    }
}
