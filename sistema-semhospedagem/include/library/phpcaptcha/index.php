<?php
session_start();
$cap = 'notEq';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['captcha'] == $_SESSION['cap_code']) {
        // Captcha verification is Correct. Do something here!
        $cap = 'Eq';
    } else {
        // Captcha verification is wrong. Take other action
        $cap = '';
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Captcha - PHP | Jquery</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#submit').click(function(){
                    var name = $('#name').val();
                    var msg = $('#msg').val();
                    var captcha = $('#captcha').val();
                    
                    if( name.length == 0){
                        $('#name').addClass('error');
                    }
                    else{
                        $('#name').removeClass('error');
                    }

                    if( msg.length == 0){
                        $('#msg').addClass('error');
                    }
                    else{
                        $('#msg').removeClass('error');
                    }

                    if( captcha.length == 0){
                        $('#captcha').addClass('error');
                    }
                    else{
                        $('#captcha').removeClass('error');
                    }
                    
                    if(name.length != 0 && msg.length != 0 && captcha.length != 0){
                        return true;
                    }
                    return false;
                });

                var capch = '<?php echo $cap; ?>';
                if(capch != 'notEq'){
                    if(capch == 'Eq'){
                        $('.cap_status').html("Your form is successfully Submitted ").fadeIn('slow').delay(3000).fadeOut('slow');
                    }else{
                        $('.cap_status').html("Human verification Wrong!").addClass('cap_status_error').fadeIn('slow');
                    }
                }
                
                

            });
        </script>
        <style type="text/css">
            body{
                
                
            }
            #form{
                margin:100px;
                width: 350px;
                outline: 5px solid #d0ebfe;
                border: 1px solid #bae0fb;
                padding: 10px;
				margin:0 auto;
            }
            #form label{
                font:bold 11px arial;
                color: #565656;
                padding-left: 1px;
            }
            #form label.mandat{color: #f00;}
            #form input[type="text"]{
                height: 30px;
                margin-bottom: 8px;
                padding: 5px;
                font: 12px arial;
                color: #0060a3;
            }
            #form textarea{
                width: 340px;
                height: 80px;
                resize: none;
                margin: 0 0 8px 1px;
                padding: 5px;
                font: 12px arial;
                color: #0060a3;
            }
            #form img{
                margin-bottom: 8px;
            }
            #form input[type="submit"]{
                background-color: #0064aa;
                border: none;
                color: #fff;
                padding: 5px 8px;
                cursor: pointer;
                font:bold 12px arial;
            }
            .error{
                border: 1px solid red;
            }
            .cap_status{
                width: 350px;
                padding: 10px;
                font: 14px arial;
                color: #fff;
                background-color: #10853f;
                display: none;
            }
            .cap_status_error{
                background-color: #bd0808;                
            }
        </style>
    </head>
    <body>
	
	
	<div style='margin:0 auto'>
	<h1>PHP Captcha Code</h1>
	More tutorials <a href="http://9lessons.info">9lessons.info</a>
        <form action="index.php" method="post">
            <div id="form">
                <table border="0" width="100%">
                    <tr>
                        <td colspan="2"><label>Name:</label><label class="mandat"> *</label><br/>
                            <input type="text" name="name" id="name"/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label>Message:</label><label class="mandat"> *</label><br/>
                            <textarea  name="msg" id="msg"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label>Enter the contents of image</label><label class="mandat"> *</label></td>
                    </tr>
                    <tr>
                        <td width="60px">                           
                            <input type="text" name="captcha" id="captcha" maxlength="6" size="6"/></td>
                        <td><img src="captcha.php"/></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Submit" id="submit"/></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </form>
        <div class="cap_status"></div>
		</div>
		
    </body>
</html>
