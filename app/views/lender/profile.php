<?php
if(isset($_SESSION['lender'])){
    extract($_SESSION['lender']);
}
?>
<html>
<?=Template::createHeader("OLSO : $fname", "manifest.json", ["main.css", "nav.css", "lender.css", "res.css"], ["app.js", "ajax.js"])?>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    
    <body>
        <!-- Desktop Navigation bar -->
        <?=Template::lenderNavigation()?>
    
        <!-- Profile section of the profile section -->
        <div class="profile">
            <div class="row default-padd">
                <div class="col-2" style="text-align:center;">
                    <a href="<?=PROOT?>uploads/lender_profile_pic/<?=$fname?><?=$phone?><?=$profile?>">
                    <div class="dp" style="background: url('<?=PROOT?>uploads/lender_profile_pic/<?=$fname?><?=$phone?><?=$profile?>');height:150px;width:150px;border-radius:50%;background-size: cover;background-position: center 0px;"></div></a>
                </div>
                <div class="col-4" style="font-family: 'Varela Round', sans-serif;">
                    <?php
                    $lender_details = Profile::getInfo();
                    extract($lender_details);
                    ?>
                    <h1 style="margin:0;"><?=$fname?></h1>
                    <p style="color:grey;">Total Earning : <b>Rs. <?=$earning?></b></p>
                    <p style="color:grey;">Followers : <b style="color:dodgerblue;"><?=$followers?></b></p>
                    <p style="color:grey;">Rating : <b style="color:orange;"><?=Profile::getRating()?> <i class="fas fa-star"></i></b></p>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-4" style="text-align:center;padding:0px;">
                            <a href="<?=PROOT?>public/res/upcoming.png">
                            <img src="<?=PROOT?>public/res/upcoming.png" alt="" style="width: 100px;">
                            </a>
                        </div>
                        <div class="col-4" style="text-align:center;padding:0px;">
                            <a href="<?=PROOT?>public/res/return.png">
                            <img src="<?=PROOT?>public/res/return.png" alt="" style="width: 100px;">
                            </a>
                        </div>
                        <div class="col-4" style="text-align:center;padding:0px;">
                            <a href="<?=PROOT?>public/res/payment.png">
                            <img src="<?=PROOT?>public/res/payment.png" alt="" style="width: 125px;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- products list of the lender -->
        <div class="default-padd products">
            <h1 style="font-family;'Varela Round', sans-serif;font-weight:normal;color:#414141;border-left:5px solid #414141;padding-left: 20px;">My Products</h1>
            <?php
            $profile = new Profile();
            $profile->getProducts();
            ?>
        </div>
        <script>
            
        </script>
    </body>
</html>