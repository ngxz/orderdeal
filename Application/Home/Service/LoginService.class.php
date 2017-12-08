<?php
namespace Home\Service;

class LoginService{
    public $error = '';
    public function __construct(){
        $this->url = 'http://api.7ying.cc/index.php/login/login';
        $this->http = new \Think\Http();
    }
    /**
     * 登录验证
     * @param unknown $params
     */
    public function loginvali($params){
        if(!$params['code']){
            $this->error = '企业编号不能为空';
            return false;
        }
        if(!$params['phone']){
            $this->error = '手机号不能为空';
            return false;
        }
        if (!$params['pwd']){
            $this->error = '密码不能为空';
            return false;
        }
        //参数
        $data['comcode'] = $params['code'];
        $data['loginid'] = $params['phone'];
        $data['password'] = md5($params['pwd']);
        $data['clienttype'] = 4;
        $url = $this->url;
        //获取数据
        $result = $this->http->postRequest($url,$data);
        $result = json_decode($result,true);
        
        if($result['status'] != '0'){
            $this->error = $result['text'];
            return false;
        }
        $this->setToken($result);
        //储存session
        $_SESSION['loginid'] = $result['userinfo']['mobile'];
        return $result;
    }
    public function getError(){
        return $this->error;
    }
    /**
     * 缓存token
     * @param unknown $param
     */
    Public function setToken($param) {
        $file = file_get_contents("./token.json",true);
        $result = json_decode($file,true);
        if (time() > $result['time']){
            $data = array();
            $data['token'] = $param['token'];
            $data['time'] = time()+7000;
            //储存token
            $fp = fopen("./token.json", "w");
            fwrite($fp,json_encode($data));
            fclose($fp);
        }
    }
}

?>