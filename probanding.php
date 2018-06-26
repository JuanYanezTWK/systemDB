<?php
?>
<html>
<head>
</head>
<body>
<div class="container">

    <div id="div_login">
        <h1>Login</h1>
        <div id="message"></div>
        <div>
            <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
        </div>
        <div>
            <input type="password" class="textbox" id="txt_pwd" name="txt_pwd" placeholder="Password"/>
        </div>
        <div>
            <input type="button" value="Submit" name="but_submit" id="but_submit" />
        </div>
    </div>

</div>
</body>
<script>
$(document).ready(function(){
    $("#but_submit").click(function(){
        var username = $("#txt_uname").val().trim();
        var userpass = $("#txt_pwd").val().trim();

        if( username != "" && password != "" ){
            $.ajax({
                url:'session/login.php',
                type:'post',
                data:{user_name:username,user_pass:password},
                success:function(response){
                    var msg = "";
                    if(response == 1){
                        window.location = "index.php";
                    }else{
                        msg = "Invalid username and password!";
                    }
                    $("#message").html(msg);
                }
            });
        }
    });
});
</script>