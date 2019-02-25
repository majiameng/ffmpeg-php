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
     * @$bin_dir string
     */
    protected $bin_dir = '';
    /**
     * 文件来源
     * @author: JiaMeng <666@majiameng.com>
     * @var string
     */
    protected $directory = '';

    protected $command = ' ';

    /**
     * Description:  getBinDir
     * @author: JiaMeng <666@majiameng.com>
     * Updater:
     * @return string
     */
    public function getBinDir(){
        return $this->bin_dir;
    }

    /**
     * Description:  getVersion
     * @author: JiaMeng <666@majiameng.com>
     * Updater:
     * @return string
     */
    public function getVersion($ffmpeg = 'ffmpeg'){
        $command = $ffmpeg.' -version';
        $info = $this->exec($command);
        return $info;
    }

    /**
     * Description:  open
     * @author: JiaMeng <666@majiameng.com>
     * Updater:
     * @param $directory
     * @return $this
     * @throws \Exception
     */
    public function open($directory){
        if(strpos($directory,'//') !== false){
            //网络链接
            try{
                $header = get_headers ($directory);
                if(!$header) {
                    throw new \Exception('视频文件链接不正确!');
                }
            }catch (\Exception $e){
                throw new \Exception($e->getMessage());
            }
        }else{
            //路径
            try{
                if(!file_exists($directory)) {
                    throw new \Exception('视频文件不存在!');
                }
            }catch (\Exception $e){
                throw new \Exception($e->getMessage());
            }
        }

        $this->directory = $directory;
        $this->command = ' -i '.$directory;
        return $this;
    }

    public function setVcodec($vcodec){
        $this->command .= ' -vcodec '.$vcodec;
    }

    public function setAcodec($acodec){
        $this->command .= ' -acodec '.$acodec;
    }

    public function setSS($ss){
        $this->command .= ' -ss '.$ss;
    }

    /**
     * Description:  save
     * @author: JiaMeng <666@majiameng.com>
     * Updater:
     */
    public function save(){

    }

    /**
     * Description:  获取视频信息
     * @author: JiaMeng <666@majiameng.com>
     * Updater:
     * @return string
     */
    public function getVideoInfo(){
        $command = 'ffprobe -i '.$this->directory.'  -v quiet  -print_format json -show_streams -select_streams v:0';
        $info = $this->exec($command);
        return json_decode($info,true);
    }

    /**
     * Description:  exec
     * @author: JiaMeng <666@majiameng.com>
     * Updater:
     * @param $command
     * @return string
     */
    public function exec($command){
        $bin_dir = $this->getBinDir();
        if(!empty($bin_dir)){
            $command = $bin_dir.'/'.trim($command);
        }
        /** 通过使用输出缓冲，获取到ffmpeg所有输出的内容 */
        ob_start();
        passthru($command.'  2>&1');
        $info = ob_get_contents();
        ob_end_clean();
        return $info;
    }
}