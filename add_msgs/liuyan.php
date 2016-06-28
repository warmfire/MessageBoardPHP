<?php
	header("Content-type: text/html; charset=gbk");
	error_reporting(E_ERROR | E_WARNING | E_PARSE);		
	include('comm.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>范正威 - php留言板</title>
<script type="text/javascript" src="http://www.kasnet.cn/Tpl/Admin/default/js/jquery.js"></script> 
<script type="text/javascript">
$(document).ready(function(e) {
    $('a.zhan').click(function(){
        var left = parseInt($(this).offset().left)+10, top=parseInt($(this).offset().top)-10, obj=$(this);
        $(this).append('<div id="zhan"><b>+1<\/b></\div>');
        $('#zhan').css({'position':'absolute','z-index':'1','color':'#C30','left':left+'px','top':top+'px'});
        $('#zhan').animate({top:top-20,opacity: 0},1,
        function(){
            $(this).fadeOut(1).remove();
            var Num = parseInt(obj.find('span').text());
               Num++;
            obj.find('span').text(Num);
        });
    return false;
    });
});
</script>
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
    <div id="ecenter">
    <div id="e_contect">
    	<div id="e_contect_1">
        </div>
        <div id="e_contect_2">
        	<div id="dp1">
                    <p>留言空间
						<font class = "jsp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						</font>
					</p>
					
            </div>
			<div id = "dp1_1">
				<SCRIPT language=JavaScript>
						<!--
						var caution = false
						function setCookie(name, value, expires, path, domain, secure) {
						var curCookie = name + "=" + escape(value) +
						((expires) ? "; expires=" + expires.toGMTString() : "") +
						((path) ? "; path=" + path : "") +
						((domain) ? "; domain=" + domain : "") +
						((secure) ? "; secure" : "")
						if (!caution || (name + "=" + escape(value)).length <= 4000)
						document.cookie = curCookie
						else
						if (confirm("Cookie exceeds 4KB and will be cut!"))
						document.cookie = curCookie
						}
						function getCookie(name) {
						var prefix = name + "="
						var cookieStartIndex = document.cookie.indexOf(prefix)
						if (cookieStartIndex == -1)
						return null
						var cookieEndIndex = document.cookie.indexOf(";", cookieStartIndex + prefix.length)
						if (cookieEndIndex == -1)
						cookieEndIndex = document.cookie.length
						return (document.cookie.substring(cookieStartIndex + prefix.length, cookieEndIndex))
						}
						function deleteCookie(name, path, domain) {
						if (getCookie(name)) {
						document.cookie = name + "=" +
						((path) ? "; path=" + path : "") +
						((domain) ? "; domain=" + domain : "") +
						"; expires=Thu, 01-Jan-70 00:00:01 GMT"
						}
						}
						function fixDate(date) {
						var base = new Date(0)
						var skew = base.getTime()
						if (skew > 0)
						date.setTime(date.getTime() - skew)
						}
						var now = new Date()
						fixDate(now)
						now.setTime(now.getTime() + 365 * 24 * 60 * 60 * 1000)
						var visits = getCookie("counter")
						if (!visits)
						visits = 1
						else
						visits = parseInt(visits) + 1
						setCookie("counter", visits, now)
						document.write("欢迎光临本站，您是第" + visits + "位访问者！")
						// -->
						
						</SCRIPT>
						
			</div>
            <div id="dp2">
                <p>当前位置：</p>
            </div>
            <div id="dp3">
                <p>留言板 > 留言提交</p>
            </div>
        </div>
        <div id="e_contect_3">
        	<div class="wrap">
					
				<div class="msg_t">
					<div><font color="#FF0000">
					<?php
						session_start();
						//include "conn.inc.php";
						//$sql="select imgurl from user where id={$_SESSION["uid"]}";
						//var_dump($sql);die;
						//$result=$mysqli->query($sql);
						//var_dump($result);die;
						//$row=$result->fetch_assoc();
						//var_dump($row);die;
						echo '<img src="'.$_SESSION["imgurl"].'" width="50" height="50">';
						echo '&nbsp;&nbsp;&nbsp;&nbsp;'.$_SESSION["name"].'，欢迎你回来！';
					?>
					唠唠嗑吧：</font></div>
				</div>
				<form action="insert.php" method="post">
					<div class="msg_c">
						<textarea class="form_text" name="con" cols="" rows=""></textarea>
					</div>
					<div class="msg_foot">
						<input name="dosubmit" type="submit" value="提交" style="background:url(img/btn.PNG) no-repeat"/>
					</div>
				</form>	
				<?php	
					include_once('mysql.php');
					connect('warmfire');
					$rs = select('post',' order by id desc');
					foreach($rs as $v){
						echo '<div class="msg_t">留言人:'.$v['name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;时间:'.date('Y-m-d H:i:s', $v['time']).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IP:'.$v['ip'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;已赞人数：<a class="zhan" href="#"><span>0</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我要赞</a></div>';
						echo '<div class="msg_c">'.$v['content'].'</div>';
					}
				?>
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
<script type="text/javascript" class="autoinsert" src="js/jquery-1.2.6.min.js"></script> 
<script src="js/snowfall.jquery.js"></script> 
<script>
        $(document).snowfall('clear');
        $(document).snowfall({
            image: "images/huaban.png",
            flakeCount:30,
            minSize: 5,
            maxSize: 22
        });
    </script>
<embed src="mp3/mingtiannihao.mp3" hidden="true" autostart="true" loop="true"> 
</body>
</html>
