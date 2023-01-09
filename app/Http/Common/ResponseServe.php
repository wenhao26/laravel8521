<?php


namespace App\Http\Common;

use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * 自定义封装的响应服务类示例
 *
 * Class ResponseServe
 * @package App\Http\Common
 */
class ResponseServe
{
    /**
     * @param int $code
     * @param string|null $message
     * @param array $data
     * @return mixed|ParameterBag|null
     */
    public static function json(int $code = 0, string $message = null, array $data = [])
    {
        /*if (!Utils::isListResult()) {
            $data = (object)$data;
        }*/

        // TODO
        $result = [
            'code'    => $code,
            'message' => $message,
            'data'    => $data,
            '_time'   => time(),
            '_id'     => Utils::genRequestID(),
        ];

        $json = json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $json = str_replace('\\/', '/', $json);
        echo $json;
        exit();
    }


}
