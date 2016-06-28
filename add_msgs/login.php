<?php
	header("Content-type: text/html; charset=gbk");
	error_reporting(E_ERROR | E_WARNING | E_PARSE);	
	
	session_start();
	if(isset($_POST["sub"])){
		include "conn.inc.php";

		$sql="select * from user where name='".$_POST["name"]."' and password='".$_POST["password"]."'";
		$result=$mysqli->query($sql);
		if($result->num_rows > 0){
			$row=$result->fetch_assoc();
			$_SESSION["name"]=$_POST["name"];
			$_SESSION["uid"]=$row["id"];
			$_SESSION["imgurl"]=$row["imgurl"];
			$_SESSION["isLogin5"]=1;
			
			echo '<script>';
			echo "location='liuyan.php?id=".$_SESSION["uid"]."'";
			echo '</script>';
		}
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>范正威 - php留言板</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<meta name="renderer" content="webkit">

		<title>首页_我的留言板</title>
		<style type="text/css">
			.wrap{ width:800px; margin:0 auto;font-family:微软雅黑;}
			.msg_t{background:#AAAAAA; margin-top:10px; padding:10px; border:#999999 1px solid;font-family:微软雅黑;}
			.msg_c{ padding:10px; border:#AAAAAA 1px solid;font-family:微软雅黑;}
			.msg_foot{ text-align:right; padding:5px;border:#AAAAAA 1px solid;font-family:微软雅黑;}
			.form_text{ width:100%; height:100px;font-family:微软雅黑;}
			.jsp{font-family:微软雅黑; font-size:15px;}
		</style>
</head>

<body>
<div id="div">
	<div id="header">
    	<div id="head">
            <a href="http://www.wucc.cn"><div id="logo1"></div></a>
            <div id="shouji">
           		<p>手机访问<a href="http://www.wucc.cn">WWW.WUCC.CN</a></p>
            </div>
        </div>
    </div>
    <div id="daohang">
    	<div id="anniu">
        </div>
    </div>
    <div id="logincenter">
    <div id="login_contect">
    	<div id="e_contect_1">
        </div>
        <div id="e_contect_2">
        	<div id="dp1">
                    <p>留言空间
						<font class = "jsp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						</font>
					</p>
					
            </div>
			<div id ="dp1_1">
			</div>
            <div id="dp2">
                <p>当前位置：</p>
            </div>
            <div id="dp3">
                <p>留言板 > 用户登录</p>
            </div>
        </div>
        <div id="login_center">
        	<div class="wrap">
				<form action="login.php" method="post">
					<table align="center" border="1" width="300">
						<caption><h1>用户登录</h1></caption>
						<tr>
							<th>用户名</th>
							<td><input type="text" name="name"></td>
						</tr>
						<tr>
							<th>密 码</th>
							<td><input type="password" name="password"></td>
						</tr>
						<tr>
							
							<td colspan="2" align="center">
								<input type="submit" name="sub" value="登 录">
								<a href="register.php"><input type="button" name="res" value="注 册"></a>
							</td>
						</tr>
					</table>
				</form>
			</div>
        </div>
    </div>
    </div>
    <div id="footer">
    	<div id="foot">
    		<div id="banquan">
            	<p>帮助中心&nbsp;|&nbsp;隐私条款&nbsp;|&nbsp;关于我们</p>
            </div>
    		<div id="logo2">
            	<p>©2015.FZW Technology Co.Ltd<br/>浙ICP备09104593</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
