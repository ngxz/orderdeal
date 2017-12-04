<?php
namespace Home\Controller;
use Home\Controller\PublicController;
class IndexController extends PublicController {
    public function _initialize(){
        parent::_initialize();
    }
    /**
     * 登录后进入的首页
     */
    public function home(){
        
        $this->display();
    }
}