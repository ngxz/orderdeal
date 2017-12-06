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
        $file = file_get_contents('./token.json',true);
        $result = json_decode($file,true);
        $data['token'] = $result['token'];
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
        $file = file_get_contents('./token.json',true);
        $result = json_decode($file,true);
        $data['token'] = $result['token'];
        $data['status'] = 1;
        $url = $this->url.'/getclass';
        //发送
        $result = $this->http->postRequest($url,$data);
        $result = json_decode($result,true);
        
        return $result['list'];
    }
    public function getError(){
        return $this->error;
    }
}

?>