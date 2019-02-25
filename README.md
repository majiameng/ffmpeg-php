# ffmpeg-php

php使用ffmpeg视频分析

php使用ffmpeg的扩展不再支持php高版本升级,这里使用 passthru 函数来执行视频分析

安装
```
composer require tinymeng/ffmpeg-php 1.0.0  -vvv
```

> 类库使用的命名空间为 <code> \\tinymeng\\ffmpeg </code>



####  获取视频信息

```php

use \tinymeng\ffmpeg\FFMpeg;

$url = 'http://video-oss.959.cn/video/2018-12-27/8hYHmx4BZ7zE5kSa.mp4';
//或
$url = '/data/wwwroot/123.mp4';

$ffmpeg = FFMpeg::create();
$ffmpeg = $ffmpeg->open($url);
$info = $ffmpeg->getVideoInfo();

var_dump($info);

```

获取的视频信息如下

```php

array(1) {
  ["streams"]=>
  array(1) {
    [0]=>
    array(34) {
      ["index"]=>
      int(0)
      ["codec_name"]=>
      string(4) "h264"
      ["codec_long_name"]=>
      string(41) "H.264 / AVC / MPEG-4 AVC / MPEG-4 part 10"
      ["profile"]=>
      string(8) "Baseline"
      ["codec_type"]=>
      string(5) "video"
      ["codec_time_base"]=>
      string(4) "1/50"
      ["codec_tag_string"]=>
      string(4) "avc1"
      ["codec_tag"]=>
      string(10) "0x31637661"
      ["width"]=>
      int(1280)
      ["height"]=>
      int(720)
      ["coded_width"]=>
      int(1280)
      ["coded_height"]=>
      int(720)
      ["has_b_frames"]=>
      int(0)
      ["sample_aspect_ratio"]=>
      string(3) "1:1"
      ["display_aspect_ratio"]=>
      string(4) "16:9"
      ["pix_fmt"]=>
      string(7) "yuv420p"
      ["level"]=>
      int(31)
      ["color_range"]=>
      string(2) "tv"
      ["chroma_location"]=>
      string(4) "left"
      ["refs"]=>
      int(1)
      ["is_avc"]=>
      string(4) "true"
      ["nal_length_size"]=>
      string(1) "4"
      ["r_frame_rate"]=>
      string(4) "25/1"
      ["avg_frame_rate"]=>
      string(4) "25/1"
      ["time_base"]=>
      string(7) "1/25000"
      ["start_pts"]=>
      int(0)
      ["start_time"]=>
      string(8) "0.000000"
      ["duration_ts"]=>
      int(3015000)
      ["duration"]=>
      string(10) "120.600000"
      ["bit_rate"]=>
      string(6) "535844"
      ["bits_per_raw_sample"]=>
      string(1) "8"
      ["nb_frames"]=>
      string(4) "3015"
      ["disposition"]=>
      array(12) {
        ["default"]=>
        int(1)
        ["dub"]=>
        int(0)
        ["original"]=>
        int(0)
        ["comment"]=>
        int(0)
        ["lyrics"]=>
        int(0)
        ["karaoke"]=>
        int(0)
        ["forced"]=>
        int(0)
        ["hearing_impaired"]=>
        int(0)
        ["visual_impaired"]=>
        int(0)
        ["clean_effects"]=>
        int(0)
        ["attached_pic"]=>
        int(0)
        ["timed_thumbnails"]=>
        int(0)
      }
      ["tags"]=>
      array(4) {
        ["creation_time"]=>
        string(27) "2018-11-06T02:42:48.000000Z"
        ["language"]=>
        string(3) "eng"
        ["handler_name"]=>
        string(35) "Mainconcept MP4 Video Media Handler"
        ["encoder"]=>
        string(10) "AVC Coding"
      }
    }
  }
}

```


#### 截取部分视频

```angular2html

$url = '/data/wwwroot/123.mp4';

$ffmpeg = FFMpeg::create();
$start = '00:00:00';//开始时间
$end = '00:01:00';//结束时间
$save_name = trim(strrchr($url, '/'),'/');//获取文件名
$save_dir  = './tmp_video/'.rand(111,999).$save_name;//保存的文件路径
$command = 'ffmpeg  -i '.$url.' -vcodec copy -acodec copy -ss '.$start.' -to  '.$end.' '.$save_dir;
$result = $ffmpeg->exec($command);
var_dump($result);

```