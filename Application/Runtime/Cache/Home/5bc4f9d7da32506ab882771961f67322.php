<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	您的成绩是: <?php echo ($score); ?> <br>

	<?php if($score >= 90): ?>超级棒
	<?php elseif(score >= 80): ?>
		很棒
	<?php elseif(score >= 70): ?>
		棒
	<?php elseif(score >= 60): ?>
		一般般吧
	<?php else: ?>
		差劲耶<?php endif; ?>


	<!-- 循环 -->
	<!-- 从1开始  到100结束  每次间隔10  name为变量名称-->
	<?php $__FOR_START_1236035490__=1;$__FOR_END_1236035490__=100;for($a=$__FOR_START_1236035490__;$a < $__FOR_END_1236035490__;$a+=10){ ?>第 <?php echo ($a); ?> 次 <br><?php } ?>
</body>
</html>