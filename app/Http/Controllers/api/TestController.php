<?php


namespace App\Http\Controllers\api;

use App\Http\Common\BaseAPI;
use App\Http\Common\ResponseServe;

/**
 * Class TestController
 * @package App\Http\Controllers\api
 */
class TestController extends BaseAPI
{
    public function info()
    {
        // 获取自定义的request数据
//        dd(request()->customData);

        // 响应示例
        /*return response()->json([
            'code'    => 0,
            'message' => 'OK',
            'data'    => [
                'version' => '8.8.87'
            ]
        ]);*/

        // 调用自定义封装的响应方法
        return ResponseServe::json(0, 'Success', ['user_id' => 888, 'name' => 'TEST-NAME']);
    }


}
