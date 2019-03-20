<html>
<?=Template::createHeader("OLSO : Change Password ", "manifest.json", ["main.css", "nav.css", "lender.css", "res.css"], ["app.js"])?>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    
    <body>
        <!-- Desktop Navigation bar -->
        <nav>
            <ul>
                <li><a href="<?=PROOT?>" style="margin-right: 30px;"><img src="<?=PROOT?>public/res/olso.png" alt=""></a></li>
                <?php
                if(isset($_SESSION['lender'])){
                    extract($_SESSION['lender']);
                    ?>
                    <li class="right dropdown"><span style="height: 50px; width: 50px; background: url('<?=PROOT?>uploads/lender_profile_pic/<?=$fname?><?=$phone?><?=$_SESSION['lender']['profile']?>');display: block;background-position: center 0px;background-size: cover;border-radius:50%;"></span>
                        <div class="content">
                            <a href="<?=PROOT?>lenders/addProduct">Add Products</a>
                            <a href="<?=PROOT?>lenders/editprofile">Edit Profile</a>
                            <a href="<?=PROOT?>lenders/changepassword" id="password-change">Change Password</a>
                            <a href="<?=PROOT?>lenders/logout" id="logout">Logout</a>
                        </div>
                    </li>
                    <li class="right active"><a href="<?=PROOT?>lenders" style="text-transform: uppercase;border-color: transparent;"><b><?=$_SESSION['lender']['fname']?></b></a>
                        
                    </li>
                    
                    <?php
                }else{
                    ?>
                    <li class="right active"><a href="<?=PROOT?>lenders">LEND ON OLSO</a></li>
                    <?php
                }
                ?>
                <li class="right"><a href="<?=PROOT?>">HOME</a></li>
            </ul>
        </nav>
        <div class="change-password" id="change-password">
            <div class="signup">
                <h1 style="color:#6A4DFF">Reset your password</h1>
                <form action="" method="post" id="myform">
                    <div>
                        <input type="password" name="password" id="password" required="required">
                        <label for="password">New Password</label>
                    </div>
                    <div>
                        <input type="password" name="confirm" id="confirm" required="required">
                        <label for="confirm">Confirm Password</label>
                    </div>
                    <div>
                        <input type="submit" value="Change Password" name="submit">
                    </div> 
                    <div>
                    <?php
                    if(isset($_GET['err'])){
                        ?>
                        <p style="color:red;font-size: 15px;padding: 0px 15px"><?=$_GET['err']?></p>
                        <?php
                    }else if(isset($_GET['msg'])){
                        ?>
                        <p style="color: green;font-size:15px;padding:0px 15px;"><?=$_GET['msg']?></p>
                        <?php
                    }
                    ?>
                    </div>   
                </form>
            </div>
        </div>
    </body>
</html>
