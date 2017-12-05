<?php
namespace Home\Service;

class OrderService{
    public $error = '';
    public function __construct(){
        $this->url = 'http://api.7ying.cc/index.php/mall/getorderlist/';
        $this->http = new \Think\Http();
    }
    /**
     * 根据状态请求数据
     * @param unknown $param
     */
    public function orderlist($param){
        $data = array();
        $data['status'] = $param;
        $file = file_get_contents("./token.json",true);
        $result = json_decode($file,true);
        $token = $result['token'];
        $data['token'] = $token;
        $url = $this->url;
        //获取
        $result = $this->http->getRequest($url,$data);
        $result = json_decode($result,true);
        
        if ($result['count'] == 0){
            $this->error = '该状态没有订单哦！';
            return false;
        }
        return $result['list'];
    }
    public function getError(){
        return $this->error;
    }
}

?>