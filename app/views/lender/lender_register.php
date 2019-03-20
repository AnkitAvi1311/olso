<html>
<?=Template::createHeader("OLSO : Lender's Signup ", "manifest.json", ["main.css", "nav.css"], ["app.js", "validation.js"])?>
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
        <h1 style="color:#6A4DFF">Lender's Registeration</h1>
        <form action="<?=PROOT?>lenders/register" method="post" id="myform" enctype="multipart/form-data">
            <div>
                <input type="text" name="fname" id="fname" required = "required">
                <label for="fname">Full Name</label>
            </div>
            <div>
                <input type="email" name="email" id="email" required="required">
                <label for="email">Email Address</label>
            </div>
            <div>
                <input type="number" name="phone" id="phone" required="required">
                <label for="phone">Phone</label>
            </div>
            <div>
                <input type="password" name="password" id="password" required="required">
                <label for="password">Password</label>
            </div>
            <div>
                <input type="file" name="profile" id="profile" style="display:none;">
                <p style="padding: 0px 15px;font-size: 15px;">Choose a profile picture</p>
                <div id="p-display" style="height:125px; width: 125px;border: 1.5px solid lightgrey;margin: auto;border-radius: 4px;"></div>
                <div id="p-button" style="width:125px;text-align:center;margin:5px auto;padding: 5px 10px;font-size: 13px;cursor: pointer;border: 1px solid lightgrey;border-radius:4px;">Select</div>
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
            <div class="fixit">
                <input type="submit" value="SIGNUP" name="submit" style="float:left;" id='submit'> <span style="font-size: 14px;float: right;padding: 12px 0px;">Already have an account ? <b><a href="<?=PROOT?>lenders/login" style="text-decoration :none;color:#6A4DFF">Login here</a></b></span> 
            </div>
            <div>
                <p style="font-size: 12px;">By clicking the <b>Signup</b> button you agree to our <a href="#">Terms and conditions</a> and <a href="#">privacy policies</a>.</p>
            </div>
        </form>
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