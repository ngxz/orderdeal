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
            $data = array();
            if (!$result){
                $data['status'] = -1;
                $data['msg'] = $this->login_service->getError();
                $this->ajaxReturn($data);
            }
            $data['status'] = 1;
            $data['msg'] = '登录成功，跳转中...';
            $this->ajaxReturn($data);
        }else {
            $this->display();
        }
    }
}

?>