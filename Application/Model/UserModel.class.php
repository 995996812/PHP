<?php 
namespace Model;
use Think\Model;

class UserModel extends Model
{
	// 字段映射
	protected $_map = array(
		'name' => 'username',
		'pwd' => 'password', 
		'email' => 'user_email',  
	);
    //自动完成
	protected $_auto = array(
		array('nation','中国'),
		array('password','md5',1,'function'),//PHP函数用function
		array('username','getName',1,'callback')//自定义函数用callback
	);

	public function getName($value)
	{
		return '尊敬的: '.$value;
	}
}
 ?>