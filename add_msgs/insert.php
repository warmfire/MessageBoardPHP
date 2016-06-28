<?php	
	header("Content-type: text/html; charset=gbk");
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include('comm.php');
	include('mysql.php');
	connect('warmfire');
	if(isset($_POST))
	{
		$content = $_POST['con'];
		$nick_name = $_SESSION["name"];
		$add_time = time();
		$ip = $_SERVER['REMOTE_ADDR'];	
		
		$mydata = array(
			'name' => $nick_name,
			'time' => $add_time,
			'ip' => $ip,
			'content' => $content
		);
	}
	
	$rs = insert($mydata, 'post');
	if($rs != false)
		echo '<div style = "margin:10px auto; text-align:center;"><a href = "liuyan.php">爱卿留言成功!点击返回</a></div>';
	else 
		echo '<div style = "margin:10px auto; text-align:center;"><a href = "liuyan.php">爱卿留言失败!请联系朕</a></div>';
	
?>