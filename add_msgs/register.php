<?php
	header("Content-type: text/html; charset=gbk");
	error_reporting(E_ERROR | E_WARNING | E_PARSE);	
	session_start();
	if(isset($_POST["sub"])){
		include "conn.inc.php";
		include_once('UploadFile.class.php');
		$up = new UploadFile();
		$up->maxSize = 3*1024*1024;
		$up->allowExts = array('txt','jpg','gif','png','jpeg');
		$up->savePath = './files/';
		$up->thumb = true;
		$up->thumbMaxWidth = 80;
		$up->thumbMaxHeight = 80;
		$up->autoSub = true;
		$up->subType = 'date';
		$up->dateFormat = 'Ym';
		if(!$up->upload()){
			die($up->getErrorMsg());
		}
		else{
			$info = $up->getUploadFileInfo();
			$imgurl = './files/'.$info[0]['savename'];
		}
		if($_POST["name"] != "" && $_POST["password"] != ""){
		$sql="insert into user(name,password,imgurl) values('".$_POST["name"]."','".$_POST["password"]."','".$imgurl."')";
		$result=$mysqli->query($sql);
		if($result->num_rows > 0){
			$row=$result->fetch_assoc();
			$_SESSION["username"]=$_POST["username"];
			$_SESSION["uid"]=$row["id"];
			$_SESSION["isLogin5"]=1;
		}
		echo '<script>';
		echo "location='login.php'";
		echo '</script>';
		}
	}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
			.fl{float:left; margin:auto;}
			.ctr{margin:auto; width:350; position:relative; left:200px;}
		</style>
		<script type="text/javascript">
        function previewImage(file)
        {
          var MAXWIDTH  = 200; 
          var MAXHEIGHT = 200;
          var div = document.getElementById('preview');
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead>';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
             
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
</script>  
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
			<caption><h1 align="center">用户注册</h1></caption>
				<div class="ctr">
				<div class="fl">
				<form action="register.php" method="post" enctype="multipart/form-data" align="center">
					<table align="center" border="1" width="400">
						
						<tr>
							<th width="100">上传头像</th>
							<td>
								<div id="preview">
									<img id="imghead" width=100 height=100 border=0 src='/images/defaul.jpg'>
								</div>
								<input type="file" onchange="previewImage(this)" name="imgurl" />
							</td>
						</tr>
						<tr>
							<th width="100">用户名</th>
							<td><input type="text" name="name"></td>
						</tr>
						<tr>
							<th width="100">密 码</th>
							<td><input type="password" name="password"></td>
						</tr>
						<tr>
							
							<td colspan="2" align="center">
								<input type="submit" name="sub" value="注   册">
								<input type="reset" name="reset" value="重   置">
							</td>
						</tr>
					</table>
				</form>
				</div>
				</div>
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
