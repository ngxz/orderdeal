<?php
namespace Home\Controller;

use Think\Controller;
class PublicController extends Controller{
    public function _initialize(){
        //判断登录
//         if (!$_SESSION['phone']){
//             redirect(U('Home/Login/login'));
//         }
    }
}

?>