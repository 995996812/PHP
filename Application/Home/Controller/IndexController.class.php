<?php
namespace Home\Controller;
use Think\Controller;
require_once 'GoodsController.class.php';
class IndexController extends Controller {
    public function index(){
       $this->display();
    }

    public function show(){
    	echo "Index控制器的show方法 <br />";
    } 
}
 


