<html>
    <head>
        <title>Login : Administrator</title>
        
        <link rel="stylesheet" href="<?=base_url("admin_assets");?>/css/style.default.css" type="text/css" />
        
       </head>
    <body class="loginbody">
        <div class="loginwrapper">
            <div class="loginwrap zindex100 animate2 bounceInDown">
                <h1 class="logintitle"><span class="iconfa-lock"></span> Halaman Admin<span class="subtitle">Silahkan login untuk memulai.</span></h1>
                <div class="loginwrapperinner">
                    <?=form_open("administrator/login",array("id"=>"loginform"))?>
                    <p class="animate4 bounceIn"><input type="text" id="username" name="uname" placeholder="Username" required/><input type="hidden" value="<?=date("Y-m-d H:i:s")?>" name="now"></p>
                        <p class="animate5 bounceIn"><input type="password" id="password" name="upass" placeholder="Password" required/></p>
                        <p class="animate6 bounceIn"><button class="btn btn-default btn-block">Masuk</button></p>
                    <?=  form_close();?>
                </div><!--loginwrapperinner-->
            </div>
        <div class="loginshadow animate3 fadeInUp"></div>
        </div><!--loginwrapper-->
    </body>
</html>