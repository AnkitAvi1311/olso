<html>
<?=Template::createHeader("OLSO : Lender's Login ", "manifest.json", ["main.css", "nav.css"], ["app.js", "validation.js", "ajax.js"])?>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    <?php 
    $images = IMAGES;
    shuffle($images);
    ?>
    <body>
        <!-- Desktop Navigation bar -->
        <nav>
            <ul>
                <li><a href="<?=PROOT?>" style="margin-right: 30px;"><img src="<?=PROOT?>public/res/olso.png" alt=""></a></li>
                <?php
                if(isset($_SESSION['lender'])){

                }else{
                    ?>
                    <li class="right active"><a href="<?=PROOT?>lenders">LEND ON OLSO</a></li>
                    <?php
                }
                ?>
                <li class="right"><a href="<?=PROOT?>">HOME</a></li>
            </ul>
        </nav>

        <div class="signup">
        <h1 style="color:#6A4DFF">Login</h1>
        <form action="<?=PROOT?>lenders/login" method="post" id="myform" enctype="multipart/form-data">
            <div>
                <input type="email" name="email" id="email" required="required">
                <label for="email">Email Address</label>
            </div>
            <div>
                <input type="password" name="password" id="password" required="required">
                <label for="password">Password</label>
            </div>
            <!-- Error and message checking -->
            <div>
                <?php
                if(isset($_GET['error'])){
                    ?>
                    <p style="color:red;font-size: 15px;padding: 0px 15px"><?=$_GET['error']?></p>
                    <?php
                }else if(isset($_GET['msg'])){
                    ?>
                    <p style="color: green;font-size:15px;padding:0px 15px;"><?=$_GET['msg']?></p>
                    <?php
                }
                ?>
            </div>
            <div style="font-size: 14px;color:grey;">
                <p>Forgot Password ? <a href="#" id="forgot" style="text-decoration: none;color:#6a4dff;"><b>Reset Password</b></a></p>
            </div>
            <div class="fixit">
                <input type="submit" value="LOGIN" name="submit" style="float:left;" id='submit'> <span style="font-size: 14px;float: right;padding: 12px 0px;">Don't have an account ? <b><a href="<?=PROOT?>lenders/register" style="text-decoration :none;color:#6A4DFF">Register</a></b></span> 
            </div>
        </form>
    </div>

    <div class="overlay" style="display:none">
        <div class="password-overlay">
            <h3 style="margin: 0px;">Enter your email address</h3>
            <input type="email" name="email-address" id="forgot-email" style="width:100%;margin-top: 20px;padding:10px 15px;border:1.5px solid lightgrey;border-radius: 5px;color:black;;">
            <button id="send-forgot-email" style="margin-top: 20px;padding: 10px 15px;background:dodgerblue;color:white;bordeR:none;border-radius:5px;cursor: pointer;">SEND MAIL</button>
            <div id="close-overlay" style="position:absolute;top:10px;right:10px;">
                <i class="far fa-times-circle" style="font-size: 20px;;padding: 10px;cursor:pointer;color:red;"></i>
            </div>
            <p id="email-message-warning" style="font-sizE:14px;color:red"></p>
            <p id="email-message" style="font-sizE:14px;color:green"></p>
        </div>
    </div>
    
    <script>
        const file = document.getElementById('profile');
        const button = document.getElementById('p-button');
        const display = document.getElementById('p-display');
        const form = document.getElementById('fname');
        window.onload = function() {
            form.focus();
        }

        button.onclick = function() {
            file.click();
        }

        file.onchange = function(e) {
            let reader = new FileReader();
            if(file.files && file.files[0]){
                reader.onload = function(e) {
                    display.style.backgroundImage = "url("+e.target.result+")";
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
        
    </script>
    </body>
</html>