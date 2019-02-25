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
    /**
     * @author: JiaMeng <666@majiameng.com>
     * @var
     */
    static private $driver;

    /**
     * FFMpeg constructor.
     * @param $bin_dir
     * @internal param array $config
     */
    public function __construct($bin_dir)
    {
        $this->bin_dir = $bin_dir;
    }

    /**
     * Description:  create
     * @author: JiaMeng <666@majiameng.com>
     * Updater:
     * @param string $bin_dir
     * @return FFMpeg
     */
    public static function create($bin_dir = '/usr/local/ffmpeg/bin/'){
        if(self::$driver instanceof self){
            return self::$driver;
        }else{
            return self::$driver = new self($bin_dir);
        }

    }



}