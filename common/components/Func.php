<?php
/**
 * 公共函数
 * @author 边走边乔 <771405950>
 */
namespace common\components;

use Yii;

class Func {

    /**
     * 转换字节数为其他单位
     * @param string $filesize 字节大小
     * @return string 返回大小
     */
    public static function sizeCount($filesize){
        if ($filesize >= 1073741824) {
            $filesize = round($filesize / 1073741824 * 100) / 100 . ' GB';
        } elseif ($filesize >= 1048576) {
            $filesize = round($filesize / 1048576 * 100) / 100 . ' MB';
        } elseif ($filesize >= 1024) {
            $filesize = round($filesize / 1024 * 100) / 100 . ' KB';
        } else {
            $filesize = $filesize . ' Bytes';
        }
        return $filesize;
    }

}