<?php
namespace Home\Controller;

use Home\Controller\PublicController;
class GoodsController extends PublicController{
    public function _initialize(){
        parent::_initialize();
    }
    /**
     * 商品列表
     */
    public function goodslist(){
        $this->display();
    }
}

?>