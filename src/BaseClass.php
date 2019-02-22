<?php
/**
 * Name: Base.php.
 * @author: JiaMeng <666@majiameng.com>
 * Date: 2019/2/22 17:27
 * Description: Base.php.
 */

namespace tinymeng\ffmpeg;


class BaseClass
{

    /**
     * @author: JiaMeng <666@majiameng.com>
     * @var array
     */
    protected $config = [
        /** Software execution directory */
        'ffmpeg_bin_dir'=>'/usr/local/ffmpeg/bin/',
    ];

    /**
     * 文件来源
     * @author: JiaMeng <666@majiameng.com>
     * @var string
     */
    protected $directory = '';

    /**
     * Description:  open
     * @author: JiaMeng <666@majiameng.com>
     * Updater:
     * @param $directory
     * @return $this
     */
    public function open($directory){
        $this->directory = $directory;
        return $this;
    }

}