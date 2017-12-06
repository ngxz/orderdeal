<?php
namespace Home\Controller;

use Home\Controller\PublicController;
class GoodsController extends PublicController{
    public function _initialize(){
        parent::_initialize();
        $this->goods_service = D('Goods','Service');
    }
    /**
     * 获取商品类别
     */
    public function goodslist(){
        $result = $this->goods_service->goodscategory();
        $this->assign('category',$result)->display();
    }
    /**
     * 异步获取商品列表
     * 渲染商品列表html
     */
    public function ajax_html(){
        $result = $this->goods_service->goodslist(I('post.'));
        if (!$result){
            $data = array();
            $data['status'] = 0;
            $data['msg'] = $this->goods_service->getError();
            $this->assign('data',$data)->display();
        }
        $this->assign('result',$result)->display();
    }
    
    public function grounding(){
        
    }
}

?>