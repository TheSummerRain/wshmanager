<?php
require_once '../include.php';
//用来验证用户有没有登录
checkLogined();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>维书会后台管理</title>

<link rel="stylesheet" href="css/index.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/tendina.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
</head>

<body>
    <!--顶部-->
    <div class="top">
            <div style="float: left"><span style="font-size: 16px;line-height: 45px;padding-left: 20px;color: #fff">维书会管理中心</h1></span></div>
            <div id="ad_setting" class="ad_setting">
                <a class="ad_setting_a" href="javascript:; ">欢迎您<?php echo $_SESSION['adminName'];?></a>
                <ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
                    <li class="ad_setting_ul_li"> <a href="javascript:;"><i class="icon-user glyph-icon"></i>个人中心</a> </li>
                    
                    <li class="ad_setting_ul_li"> <a href="doAdminAction.php?act=logout"><i class="icon-signout glyph-icon"></i> <span class="font-bold">退出</span> </a> </li>
                </ul>
                <img class="use_xl" src="images/right_menu.png" />
            </div>
    </div>
    <!--顶部结束-->
    <!--菜单-->
    <div class="left-menu">
         <!--
            下边是管理类
        -->
        <ul id="menu">
            <li style="text-align:center">管理类</li>
            <li class="menu-list">
               <a style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>用户管理<s class="sz"></s></a>
                <ul>
                    <li><a href="userInfo.php" target="menuFrame"><i class="glyph-icon icon-chevron-right1"></i>用户基础信息管理</a></li>
                    <li><a href="generalize_info.php" target="menuFrame"><i class="glyph-icon icon-chevron-right2"></i>用户推广信息管理</a></li>
                    <li><a href="userFeedBack.php" target="menuFrame"><i class="glyph-icon icon-chevron-right3"></i>用户反馈管理</a></li>
                    <li><a href="我的微网站.html" target="menuFrame"><i class="glyph-icon icon-chevron-right3"></i>用户举报管理</a></li>
                    <li><a href="我的微网站.html" target="menuFrame"><i class="glyph-icon icon-chevron-right3"></i>开通顶级代理商</a></li>
                </ul>
            </li>
            <li class="menu-list">
               <a style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>系统管理<s class="sz"></s></a>
                <ul>
                    <li><a href="ver.php" target="menuFrame"><i class="glyph-icon icon-chevron-right1"></i>菜单管理</a></li>
                    <li><a href="产品管理.html" target="menuFrame"><i class="glyph-icon icon-chevron-right2"></i>权限管理</a></li>
                    <li><a href="我的微网站.html" target="menuFrame"><i class="glyph-icon icon-chevron-right3"></i>管理员管理</a></li>
                </ul>
            </li>
            <li class="menu-list">
               <a href="##" style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>书籍管理<s class="sz"></s></a>
               <ul>
                    <li><a href="bookInfoAdd.php" target="menuFrame"><i class="glyph-icon icon-chevron-right1"></i>添加书籍</a></li>
                    <li><a href="bookInfoModify.php" target="menuFrame"><i class="glyph-icon icon-chevron-right2"></i>修改书籍</a></li>
                </ul>
            </li>
            <li class="menu-list">
               <a href="##" style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>提现管理<s class="sz"></s></a>
               <a href="##" style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>需求池管理<s class="sz"></s></a>
               <a href="##" style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>活动管理<s class="sz"></s></a>
               <a href="##" style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>公告管理<s class="sz"></s></a>
               <a href="##" style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>礼品管理<s class="sz"></s></a>
               <a href="##" style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>商城管理<s class="sz"></s></a>
               <a href="##" style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>主播信息管理<s class="sz"></s></a>
               <a href="##" style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>嘉宾管理<s class="sz"></s></a>
            </li>
            <!--
            下边是查询类
            -->
            <li style="text-align:center">查询类</li>
            <li class="menu-list">
               <a style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>提现信息查询<s class="sz"></s></a>
                <ul>
                    <li><a href="home.php" target="menuFrame"><i class="glyph-icon icon-chevron-right1"></i>提现申请列表</a></li>
                    <li><a href="产品管理.html" target="menuFrame"><i class="glyph-icon icon-chevron-right2"></i>已经成功提现列表查询</a></li>
                    <li><a href="我的微网站.html" target="menuFrame"><i class="glyph-icon icon-chevron-right3"></i>提现失败列表</a></li>
                    <li><a href="我的微网站.html" target="menuFrame"><i class="glyph-icon icon-chevron-right3"></i>提现冻结列表</a></li>
                </ul>
                <a style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>用户信息查询<s class="sz"></s></a>
                <ul>
                    <li><a href="home.php" target="menuFrame"><i class="glyph-icon icon-chevron-right1"></i>基础信息综合查询</a></li>
                     <li><a href="home.php" target="menuFrame"><i class="glyph-icon icon-chevron-right1"></i>子主题</a></li>
                </ul>
            </li>
           
            <!--
            下边是报表类
            -->
              <li style="text-align:center">报表类</li>
            <li class="menu-list">
               <a href="##" style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>当月新增用户报表<s class="sz"></s></a>
               <a href="##" style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>收入信息报表<s class="sz"></s></a>
               <a href="##" style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>对账表<s class="sz"></s></a>
               <a href="##" style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>当月最受欢迎书籍<s class="sz"></s></a>
            </li>
              <!--
            下边是设置类
            -->
              <li style="text-align:center">设置类</li>
            <li class="menu-list">
               <a style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>参数设置类<s class="sz"></s></a>
                <a style="cursor:pointer" class="firsta"><i  class="glyph-icon xlcd"></i>系统设置类<s class="sz"></s></a>
            </li>
            
               
                
           
              <!--
            下边是特殊类
            -->
              
          
        </ul>
     </div>
    
    <!--菜单右边的iframe页面-->
    <div id="right-content" class="right-content">
        <div class="content">
            <div id="page_content">
                <iframe id="menuFrame" name="menuFrame" src="ver.php"
                        scrolling="yes" frameborder="no" width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">

</script>
</html>