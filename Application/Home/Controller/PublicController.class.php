<?php
namespace Home\Controller;

use Think\Controller;
class PublicController extends Controller{
    public function _initialize(){
        //判断登录
        if (!$_SESSION['loginid']){
            redirect(U('Home/Login/login'));
        }
        //移动设备浏览，则切换模板
        if (ismobile()) {
            //设置默认默认主题为 Mobile
//          C('DEFAULT_THEME','Mobile');
			//设置默认默认视图为 Mobile
            C('DEFAULT_V_LAYER','Mobile');
        }
    }
}

?>