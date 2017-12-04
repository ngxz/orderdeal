<?php
namespace Home\Controller;

use Think\Controller;
class LoginController extends Controller{
    public function _initialize(){
        $this->login_service = D('Login','Service');
    }
    /**
     * 登录页面
     */
    public function login(){
        if (IS_POST){
            $result = $this->login_service->loginvali(I("post."));
        }else {
            $this->display();
        }
    }
}

?>