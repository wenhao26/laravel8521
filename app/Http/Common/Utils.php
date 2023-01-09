<?php


namespace App\Http\Common;


/**
 * 自定义的实用工具类
 *
 * Class Utils
 * @package App\Http\Common
 */
class Utils
{
    /**
     * 是否列表结果响应
     *
     * @return bool
     */
    public static function isListResult()
    {
        $bindingFields = self::getBindingFields();
        return isset($bindingFields['is_list']) && $bindingFields['is_list'];
    }

    /**
     * 获取绑定字段数据
     *
     * @return array
     */
    public static function getBindingFields()
    {
        return request()->route()->bindingFields() ?? [];
    }

    /**
     * 生成请求ID
     *
     * @return string
     */
    public static function genRequestID(): string
    {
        $uniqID = uniqid(mt_rand(), true);
        $charID = strtoupper(md5($uniqID));
        $hyphen = chr(45); // "-"

        return substr($charID, 0, 8) . $hyphen
            . substr($charID, 8, 4) . $hyphen
            . substr($charID, 12, 4) . $hyphen
            . substr($charID, 16, 4) . $hyphen
            . substr($charID, 20, 12);
    }

}
