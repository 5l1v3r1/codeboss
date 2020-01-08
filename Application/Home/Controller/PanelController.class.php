<?php
namespace Home\Controller;
use Think\Controller;
class PanelController extends CommonController { 
    public function index(){
        //echo "hahaha";
        $this->display(T('home/panel_index'));
    }
    public function account_page(){
        $this->display(T('home/panel_account_show'));
    }
    public function recharge_page(){
        $this->display(T('home/panel_recharge_show'));
    }
}