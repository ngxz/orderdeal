<?php
namespace Home\Service;

class GoodsService{
    public function __construct(){
        $this->url = 'http://api.7ying.cc/index.php/mall';
        $this->http = new \Think\Http();
    }
    /**
     * 获取商品列表数据
     */
    public function goodslist($param){
        $data = array();
        $data['classid'] = $param['category'];
        $data['token'] = $this->getToken();
        $data['status'] = 1;
        $url = $this->url.'/getgoodlist';
        //发送
        $result = $this->http->getRequest($url,$data);
        $result = json_decode($result,true);
        
        if ($result['count'] == 0){
            $this->error = '该类别没有商品哦';
            return false;
        }
        return $result['list'];
    }
    /**
     * 获取商品所有类别
     */
    public function goodscategory(){
        //参数
        $data['token'] = $this->getToken();
        $data['status'] = 1;
        $url = $this->url.'/getclass';
        //发送
        $result = $this->http->postRequest($url,$data);
        $result = json_decode($result,true);
        return $result['list'];
    }
    /**
     * 修改上下架状态
     * @param unknown $params
     */
    public function grounding($params){
        //参数
        $data['token'] = $this->getToken();
        $data['status'] = $params['is_ok'];
        $data['goodid'] = $params['id'];
        $url = $this->url.'/editgoodstatus';
        //发送
        $result = $this->http->getRequest($url,$data);
        if ($result != 1){
            $this->error = '修改失败';
            return false;
        }
        return true;
    }
    /**
     * 修改价格
     * @param unknown $params
     */
    Public function editprice($params){
        if(!$params['newprice']){
            $this->error = '请输入新价格';
            return false;
        }
        //参数
        $data['token'] = $this->getToken();
        $data['price'] = $params['newprice'];
        $data['goodid'] = $params['id'];
        $url = $this->url.'/editgoodprice';
        //发送
        $result = $this->http->getRequest($url,$data);
        if ($result != 1){
            $this->error = '修改失败';
            return false;
        }
        return true;
    }
    /**
     * 读取token
     */
    public function getToken(){
        $file = file_get_contents('./token.json',true);
        $result = json_decode($file,true);
        $token = $result['token'];
        return $token;
    }
    public function getError(){
        return $this->error;
    }
}

?>