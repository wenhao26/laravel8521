<?php


namespace App\Http\Common;


use Illuminate\Routing\Controller as BaseController;

class BaseAPI extends BaseController
{
    public function __construct()
    {
        // 获取请求头信息
        //dd(request()->header());

        // 定义request
        request()->customData = [
            'user_id' => 8888
        ];

    }

}
