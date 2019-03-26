<html>
<?=Template::createHeader("OLSO : Lender Page ", "manifest.json", ["main.css", "nav.css"], ["app.js"])?>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="icon" href="<?=PROOT?>public/res/olso.png">
    </head>
    
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

        <!-- Welcome banner -->
        <div class="container" style="padding: 20px 100px;">
            <div class="row">
                <div class="col-6" style="text-align:center;">
                <?php
                $images = IMAGES;
                shuffle($images);
                ?>
                    <img src="<?=PROOT?>public/res/<?=$images[0]?>" alt="">
                </div>
                <div class="col-6" style="padding: 60px 0px 0px 20px;color:black">
                    <h1 style=>RENT SAFE <br/> USE AT EASE</h1>
                    <h3 style="font-weight:normal;color:grey;">JOIN US IN THE NEXT ECOMMERCE REVOLUTION OF SHARING. EARN THROUGH YOUR PRODUCTS AND IT’S STILL YOURS!HOME TO VARIETY OF PRODUCTS AVAILABLE FOR RENT AT YOU FINGERTIPS.</h3>
                    <div style="margin-top: 35px;">
                        <a href="<?=PROOT?>lenders/register" id="start">GET STARTED</a>
                    </div>
                    <div style="margin-top: 40px;">
                        <p>Already a member ? <a href="<?=PROOT?>lenders/login" style="color:#6A4DFF;text-decoration: none;">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>