<?php
namespace Home\Controller;

use Home\Controller\PublicController;
class OrderController extends PublicController{
    public function _initialize(){
        parent::_initialize();
    }
    /**
     * 未发货/待处理订单
     */
    public function ordersearch(){
        $this->display();
    }
    /**
     * 已完成订单
     */
    public function orderfinish(){
        $this->display();
    }
    /**
     * 失效的订单
     */
    public function orderlose(){
        $this->display();
    }
}

?>