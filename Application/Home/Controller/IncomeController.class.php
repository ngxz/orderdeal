<?php
namespace Home\Controller;

use Think\Controller;
class IncomeController extends Controller{
    /**
     * 所有门店收益
     */
    public function store(){
        $this->display();
    }
    /**
     * 单个门店收益统计
     */
    public function detailed(){
        $this->display();
    }
    /**
     * 单个门店月收益统计
     */
    public function monthly(){
        $this->display();
    }
    /**
     * 单个门店日收益统计
     */
    public function daily(){
        $this->display();
    }
}

?>