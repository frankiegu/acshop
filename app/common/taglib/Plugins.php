<?php
namespace app\common\taglib;
use think\template\TagLib;
use think\Template;
class Plugins extends TagLib{
    protected $tags   =  [
        'include'     => ['attr' => 'file', 'close' => 0], 
    ];

    public function tagInclude($tag, string $content): string
    {
        $name = $tag["file"];
        $parse = '<?php ';
        $parse .= '\think\facade\View::engine()->layout(false);';
        //$parse .= 'echo  \think\facade\View::display(file_get_contents(root_path()."'.$name.'"));';
        $parse .= 'echo  \think\facade\View::fetch(root_path()."plugin/".'.$name.'.".html");';
        $parse .= ' ?>';
        return $parse;
    }
    
   
}