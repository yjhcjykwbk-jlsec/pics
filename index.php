<?php 
$ENCODE="utf-8";//应该和文件系统保持一致
$curDir=isset($_REQUEST['dir'])?$_REQUEST['dir']:"最美中国风";
$user=isset($_REQUEST['user'])?$_REQUEST['user']:"";
$users=["linhc","public",".private."];
if(!in_array($user,$users)){
?>
<html>
<meta charset="<?php echo $ENCODE;?>">
<title>用户名或密码错误</title>
<div style="margin:auto auto;text-align:center;">
<h1>Forbidden Access</h1>
<form action=""><input name="user" placeholder="口令"> <input type="submit" value="登录"> </form>
<style>img{opacity:0.5;width:50%;} img:hover{opacity:1;}</style>
<img id="img"  src="default0.png"></img><br>
If you like the website, please leave some message here.<br>
and the author will assign you an ID to log in <br>
<input type="text" id="advice" placeholder="输入建议"/>
<button type="submit" id="submit_advice" onclick="submitAdvice(advice.value);">提交</button>
<script type="text/javascript" src="src/jquery.min.js"></script>
<script type="text/javascript" src="src/advice.js"></script>
<script>var i=0; setInterval(function(){i++;img.src="default"+(i%2)+".png";},4000);</script>
</div>
</html>

<?php 
exit();
}
?>

<html>
<head>
<meta charset="<?php echo $ENCODE;?>">
<title>红尘，一场漫天的尘埃</title>
<link rel="stylesheet" type="text/css" href="css/container.css" />
<link rel="stylesheet" type="text/css" href="css/item.css" />
<link rel="stylesheet" type="text/css" href="css/contextMenu.css" />

<!-- style related codes -->
<!--
-->
<style>
 ::-webkit-scrollbar {width:10px;background-color:transparent;border-radius:1px;}
::-webkit-scrollbar-thumb {box-shadow: 0px 0px 0px 0px rgba(127,127,127,0.04); background-color:rgba(227,227,227,1);border-radius:1px;}
::-webkit-scrollbar-thumb:active {background-color:#f99;border-radius:2px;}
::-webkit-scrollbar-thumb:hover {background-color:#f99;border-radius:2px;}
.fButton{text-align:center;align:center;}
#photo_view{padding:0px;border-top:0px solid rgba(5,5,5,0.06);border-left:0px solid rgba(5,5,5,0.16);border-right:0px solid rgba(5,5,5,0.16);border-radius:0px;}
#header select|button {
  background:#482932;color:#000;font-size:110%;font-weight:bold;border:0;border-left:0px solid rgba(128,128,128,0.5);height:100%;text-align:center;
}
</style>

</head>
<body id="body" style="background:url(whitebg) fixed center top #f0f0f0;height:200%;overflow-x:hidden;overflow-y:scroll;">

<script type="text/javascript" src="src/jquery.min.js"></script>
<script type="text/javascript" src="src/jquery.contextmenu.js"></script>

<!-- //header -->
<!--<div style="display:block;width:100%;height:2%;margin-top:0px;z-index:101;"></div> -->
<div class="header" id="header" style="position:absolute;top:0;font:10px;background:url(header.index.jpg) no-repeat #fff;border:0px solid rgba(120,120,120,0.3);width:100%;opacity:1;left:0%;height:39px;z-index:100;">
<p>
<select style="float:right;opacity:0.5;margin-top:0px;" align="left" id="selects" onclick="">
<option value="3">每页三列</option>
<option value="4">每页四列</option>
<option value="5">每页五列</option>
<option value="6">每页六列</option>
<option value="7">每页七列</option>
</select>
<button onclick="toggleUploadForm();" style="float:right;opacity:0.5">上传</button>
<select id="music_select" onclick="setMusic(this.value);"style="float:right;opacity:0.5">
<option value="0">请选择背景音乐</option>
<option value="stop">关闭音乐</option>
</select>
<select onclick="setScore(this.value);"style="float:right;opacity:0.5">
<option value="0">请给本网站打分</option>
<option value="1">1星 20分</option>
<option value="2">2星 40分</option>
<option value="3">3星 60分</option>
<option value="4">4星 80分</option>
<option value="5">5星 100分</option>
</select>
<select
style="float:right;display:;height:;opacity:0.5;
color:#444;" onclick="guide();">
<option>时光静美，光影沉默.刹那韶华，留存感动</option>
<option value="">点击播放演示</option>
</select>
<div align="center">
<a id="index_href" href="albums.php" 
style="font-size:110%;display:;margin-top:8px;height:;font-weight:bold;
color:#8af;">
一夕一绽一缕芳,一生一叹一痕沙</a></div>
</p>
<?php include_once "uploadview.php";?>
</div>


<div id="chengxuyuan" style="display:block;width:180px;bottom:46%;right:46%;border-radius:1px;padding:20px;box-shadow:5px 10px 10px 2px #222;z-index:1;position:fixed;opacity:0.9;background:#eee;">
<img src="yuan.gif" width="100%" style="margin-left:auto;margin-right:auto" onclick="dubaijun();return false;"/><br/>
<div id="yuanIntro" style="margin-left:5px">
程序猿来了！大家快跑！
</div>
<a onclick="chengxuyuanGoDie();return false;">让程序猿去死</a>
</div>
<div id="message" onclick="endFun(0);" style="right:120px;bottom:90px;border-radius:20px;padding:20px;width:300px;box-shadow:6px 6px 10px 2px #312;z-index:101;position:fixed;opacity:0.9;background:#eee;color:#333;display:none;">
<div id="message_content"></div>
<pre id="message_pre_content" style="font-size:13px;font-weight:bold;"></pre>
</div>


<div class="fButtons" id="fbuttons" style="position:fixed;opacity:0.7;right:0;color:#212;top:22%;width:25px;border:0px solid #eee;background:#ddd;z-index:103;border-radius:0px">
<button href="#header" onclick="location.href='#header';" class="fButton" id="goheader" style="display:block;border:1px solid #eee;background:transparent;width:100%;height:40px;">up</button>
<button href="#end" onclick="location.href='#end'" class="fButton" id="goend" style="display:block;border:1px solid #eee;background:transparent;width:100%;height:40px;">down</button>
<button class="fButton" id="prev" onclick="prevFun();" 		style="border:1px solid #eee;background:#ddd;width:100%;height:40px;">上张</button>
<button class="fButton" id="next" onclick="nextFun();" 		style="border:1px solid #eee;background:#ddd;width:100%;height:40px; ">下张</button>
<button class="fButton" id="bigger" onclick="biggerFun();" 	style="border:1px solid #eee;background:#ddd;width:100%;height:40px; ">放大</button>
<button class="fButton" id="smaller" onclick="smallerFun();" 	style="border:1px solid #eee;background:#ddd;width:100%;height:40px; ">缩小</button>
<button class="fButton" id="darker" onclick="darkerFun(1);" 	style="border:1px solid #eee;background:#ddd;width:100%;height:40px; ">灯光</button>
<button class="fButton" id="menus" onclick="toggleMenus();" 	style="border:1px solid #eee;background:#ddd;width:100%;height:50px; ">左导航</button>
<button class="fButton" id="zoomer" style="border:1px solid #eee;background:#ddd;width:100%;height:40px; ">zoom</button>
</div>


<?php include "photo.php";?>
<?php include "menu.php";?>
<?php include "photolst.php";?>

<!--// <div style="display:none;position:fixed;bottom:0;width:100%;height:;background:rgba(250,250,250,0.8);z-index:100;opacity:0.5;border-top:0 1px 5px rgba(0,0,0,0.5);"></div>-->
<div id="container_div" style="position:relative;left:3%">
<div id="container" class="container" style="
border-color:#fff;
// rgba(150,40,70,0.01);
margin-top:2.8%;opacity:1;min-height:;
border-width:15px 35px;
/* background-color:rgba(240,240,240,0.8); */
background-color:#fff;
/* //rgba(40,40,40,0); */
border-style:solid;
padding-bottom:25px;border-radius:1px;
box-shadow: rgba(255, 255, 255, 0.951961) 30px 100px 60px 140px;
">
</div>
<!--/* border-color:rgba(245,245,245,0.3); */
/* box-shadow: rgba(150, 40, 70, 0.1961) 40px 0px 200px 100px; */
-->
</div>

<div id="end" style="display:block;padding-top:10px;padding-bottom:50px; opacity:0.5;  margin:0 auto; text-align:center;">Final Version 3.0<br/>
<?php include "music.php";?>
<input type="text" id="advice" value="输入建议"/>
<button type="submit" id="submit_advice" onclick="submitAdvice(advice.value);">提交</button>
<h6>or email to zgxu2008@gmail.com</h6><br/>
 <!--iframe src="uploadview.php?dir=<?php echo $curDir;?>" style="z-index:0;position:relative;bottom:10px;width:400px;height:500px;box-shadow: 2px 2px 3px 2px rgb(0,0,0);font-size: 14px;background-color:rgb(222,222,222,0.8);opacity:0.8;border:0;padding:5px;border-radius:1px; line-height: 1;"></iframe--> 
</div>

<div id="desp_form" style="
width: 220px;
height:130px;
box-shadow:4px 5px 10px 3px #888;
position: fixed;
z-index: 101;
left: 100px;
background: #fafafa;
top: 100px;
display:none;
padding:10px;
opacity:0.95;
border-radius:5px;
">
<textarea id="img_user" style="display:none"></textarea><br/>
<textarea id="img_dir" style="display:none"></textarea><br/>
<textarea id="img_name" style="display:none"></textarea><br/>
描述<textarea id="desp_input"></textarea><br/>
引用<textarea id="ref_input"></textarea>
<button onclick="setDesp(img_user.value,img_dir.value,img_name.value,desp_input.value,ref_input.value);">提交描述</button>
<button onclick="desp_form.style.display='none';">取消</button>
</div>


<!-- 下面是右键菜单1 -->
<div class="contextMenu" id="menu"> 
<ul> 
<li id="del">删除</li><ul> 
</div> 


<script> var dir=<?php echo "\"".$curDir."\"";?>;var id; var curDir=dir;var user=<?php echo "'".$user."'";?>;</script>
<script type="text/javascript" src="src/jquery.waterfall.js"></script>
<script type="text/javascript" src="src/index.js"></script>
<script type="text/javascript" src="src/photo.js"></script>
<script type="text/javascript" src="src/advice.js"></script>
<script type="text/javascript" src="src/dubai.js"></script>
<script> 
function flashFun(s,color,color1,l){
  var t="";
  var i=0;
  t=setInterval(function(){
    if(i==0){
    s.style.backgroundColor=color;
    }else{
    s.style.backgroundColor="";
    }
    i=1-i;
  },300);
  setTimeout(function(){
    clearInterval(t);
    s.style.backgroundColor=color1;
  },l);
}
function guide(){
  if(confirm("do you want to accept the album usage guide, which is highly recommended ?")) {
    s=0;
    //event 0
    var initialInter="";
    <?php if(isset($_REQUEST['id'])) {?> s=<?php echo $_REQUEST['id']?>; <?php }?>
    initialInter=setInterval(function(){
      if(!dirInited) return;
      clearInterval(initialInter);
      initialInter="";
      //event 1
      flashFun($('.item')[s],"red","transparent",4000);
      setTimeout(function(){
        togglePhotoView(s);
        toggleAutoPlay();
        //event 2 
        flashFun(menus,"red","#333",4000);
        flashFun(refresh_btn,"green","transparent",4000);
        flashFun(toggle_com,"yellow","transparent",4000);
        setTimeout(function(){
          menus.click();
          hideCom();
          hidePhLst();
          //event 3
          flashFun(auto_play,"orange","transparent",2000);
          setTimeout(function(){
            togglePhotoView(-1);
            setTimeout(function(){
              flashFun(goend,"red","#333",3000);
              setTimeout(function(){
                goend.click();
                flashFun(goheader,"green","#333",2000);
                setTimeout(function(){
                  goheader.click();
                  alert("guidance is over, thank you! now enjoy it!");
                },2000);
              },3000);
          },2000);
        },2000);
        //delay of event 2
      },4000);
      //delay of event 1
    },4000);
    //delay of event 0
  },2000);
  //delay of this 
}};
//initial demonstration
</script>
</body>
</html>
