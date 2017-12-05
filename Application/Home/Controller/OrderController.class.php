<?php
namespace Home\Controller;

use Home\Controller\PublicController;
class OrderController extends PublicController{
    public function _initialize(){
        parent::_initialize();
        $this->order_service = D('Order','Service');
    }
    /**
     * 未发货订单
     */
    public function orderunsend(){
        $result = $this->order_service->orderlist('1');
        //没有数据
        if (!$result){
            $data['status'] = 0;
            $data['msg'] = $this->order_service->getError();
            //$this->assign('data',$data)->display();
            $this->ajaxReturn($data);
            
        }
        //$this->assign('orderunsend',$result)->display();
        $this->ajaxReturn($result);
    }
    /**
     * 待收货订单
     */
    public function orderuntake(){
        $result = $this->order_service->orderlist('2');
        //没有数据
        if (!$result){
            $data['status'] = 0;
            $data['msg'] = $this->order_service->getError();
            //$this->assign('data',$data)->display();
            $this->ajaxReturn($data);
        }
        $this->ajaxReturn($result);
        //$this->assign('orderunsend',$result)->display();
    }
    /**
     * 未付款订单
     */
    public function orderunpay(){
        if (IS_POST){
            $result = $this->order_service->orderlist('0');
            //没有数据
            if (!$result){
                $data['status'] = 0;
                $data['msg'] = $this->order_service->getError();
                //$this->assign('data',$data)->display();
                $this->ajaxReturn($data);
            }
            //$this->assign('orderunsend',$result)->display();
            $this->ajaxReturn($result);
        }else {
            $this->display();
        }
    }
}

?>