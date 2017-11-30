<?php
namespace Home\Controller;

use Think\Controller;
class LoginController extends Controller{
    /**
     * 登录页面
     */
    public function login(){
        if (IS_POST){
            
        }else {
            $this->display();
        }
    }
}

?>