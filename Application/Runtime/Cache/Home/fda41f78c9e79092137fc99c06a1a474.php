<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="0BQ8Is-AyZe-vZaN_9eg5g31ST0_GHAbbSBFDNBXNea7ZFZPnviF-NPK-6Cysey2OL8PYm55Mk85ETVhpGNFoA==">
    <title>注册_PaperPass论文检测</title>
    <meta  name="description" content="★PaperPass★论文检测-全球首个中文论文相似度检测网站;提供论文查重,免费论文检测系统,毕业论文抄袭检测。最权威,动态指纹技术保障,已服务超300万人论文检测。"/>
    <meta name="keywords" content="论文,论文检测,论文查重,免费论文检测,检测系统,论文抄袭,毕业论文"/>
    <link href="/codeboss/Public/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="/codeboss/Public/css/style.css" rel="stylesheet">
    <script src="https://www.recaptcha.net/recaptcha/api.js" async defer></script>
 
      
</head>
<body>
        <style type="text/css">
        /*闪动new小图标*/
        .topnavli{position: relative}
        .new{position: absolute;
            top: 6px;
            right: 8px;
            width: 16px;
            height: 18px;
        }
    </style>
    <header class="top">
        <!--[if lt IE 9]>
        <div class="top">
        <![endif]-->
        <div class="top_con">
            <div class="topimg pull-left"><a href="/" class="topimgsize"></a></div>
                <div class="topbtn pull-right">
                    <a href="<?php echo U('Index/login');;?>" class="btn_login">登录</a>
                    <a href="<?php echo U('Index/signup');;?>" class="btn_sign">注册</a>
                </div>
                        <ul class="topnav pull-right">
            <li><a href="/"  class="topnavli ">首页</a></li><li><a href="/check"  class="topnavli ">查询真伪</a></li><li><a href="/help.htm"  class="topnavli ">帮助</a></li><li><a href="/faq.htm"  class="topnavli ">常见问题</a></li><li><a href="/site/jigou" target=_blank class="topnavli ">机构版</a></li><li><a href="/job"  class="topnavli ">招募</a></li><li><a href="/about"  class="topnavli ">关于</a></li>            </ul>
        </div>
        <!--[if lt IE 9]>
        </div>
        <![endif]-->

    </header>
    <div class="flashInfo">
            </div>
    <div class="signmain">
    <div class="signcenter">
        <div class="signinputA">
            <form id="w0" class="sign-form" action="<?php echo U('Index/post_find_pwd');;?>" method="post" data-toggle="validator" role="form">          
            <div class="form-group field-signupform-email required">
                <div class="form-group">
                    <label class="control-label" for="signupform-email">注册邮箱</label>
                    <p style="font-size:12px;margin-top:-10px;" class="help-block with-errors help-block-error"></p>
                    <input type="email" id="email" class="form-control" name="email" required />
                </div>
            </div>                  
            <div id="w1div"></div> 
            <div class="form-group field-signupform-promoterstring">
                <div class="form-group">
                    <div class="g-recaptcha" data-callback="robotVerified" data-sitekey="<?php echo C('RECAPTCHAR');;?>"></div>
                    <input type="hidden" id="tokenstring" class="form-control" name="tokenstring">
                </div>
            </div>
            <button type="submit" id="signup-button" class="btn btn-green" name="signup-button" disabled="false">找回密码</button>    
            </form>
        </div>       
    </div>
</div>
<div class="kefu">
<!--    <a target="_blank" href="http://wpa.b.qq.com/cgi/wpa.php?ln=1&key=XzgwMDA5OTMyMV80NjIyOTNfODAwMDk5MzIxXzJf"><span class="kefuqq"></span></a>-->
    <a href="javascript:void(0)" onclick="openWin('http://www.sobot.com/chat/pc/index.html?sysNum=9cf4199e87fa4693aca9188042fab045',600,700)"><span class="kefurobot"></span></a>
    <span class="kefutext">在线客服</span>
</div>
    <footer class="copyright">
        <!--[if lt IE 9]>
        <div class="copyright">
        <![endif]-->
        Copyright © 2007-2020 PaperPass.Com. 智齿数汇. 京ICP备13040071号-2.京公网安备11010802012623.京ICP证140121号 All Rights Reserved.
        <span style="display: none">
            
        </span>
        <!--[if lt IE 9]>
        </div>
        <![endif]-->
    </footer>
    <script>
        function robotVerified(data){
            console.log(data);
            
            if(data.length >10){
                $("#signup-button").removeAttr("disabled");//tokenstring
                $("#tokenstring").val(data);
            }else{
                console.log('Verified: is robot');
            }
            
        }
      </script>
    <script src="/codeboss/Public/js/jquery.js"></script>
    <script src="/codeboss/Public/bootstrap/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js" integrity="sha256-UiqIqgNXwR8ChFMaD8VrY0tBUIl/soqb7msaauJWZVc=" crossorigin="anonymous"></script>
    <script>
    //$('form').validator()
    </script>
</body>
</html>