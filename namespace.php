<?php 
namespace China\Beijing\HaiDian;

function getInfo(){
	echo "这个是China\Beijing\HaiDian的命名空间方法 <br>";
}


namespace China\Beijing;

function getInfo()
{
	echo "只是为了区分xxxxxx <br>";
}

getInfo();


HaiDian\getInfo();


\China\Beijing\HaiDian\getInfo();
 ?>