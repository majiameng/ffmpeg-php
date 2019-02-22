<?php
namespace tinymeng\ffmpeg;
/**
 * Name: FFMpeg.php.
 * @author: JiaMeng <666@majiameng.com>
 * Date: 2019/2/22 17:06
 * Description: FFMpeg.php.
 */

class FFMpeg extends BaseClass
{
    static private $driver;

    public function __construct(array $config)
    {
        $this->config = array_merge($this->config,$config);
    }

    public static function create(array $config = array()){
        if(self::$driver instanceof self){
            return self::$driver;
        }else{
            return self::$driver = new self($config);
        }

    }



}