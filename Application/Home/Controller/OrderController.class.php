<?php
namespace Home\Controller;

use Home\Controller\PublicController;
class OrderController extends PublicController{
    public function _initialize(){
        parent::_initialize();
        $this->order_service = D('Order','Service');
    }
    /**
     * 渲染订单列表html
     * 根据参数选择类型
     */
    public function ajax_html(){
        $result = $this->order_service->orderlist(I('post.'));
        //没有数据
        if (!$result){
            $data['status'] = 0;
            $data['msg'] = $this->order_service->getError();
            $this->assign('data',$data)->display();
            exit();
        }
        $this->assign('orderlist',$result)->display();
    }
    /**
     * 订单列表页面
     */
    public function orderlist(){
        $this->display();
    }
}

?>