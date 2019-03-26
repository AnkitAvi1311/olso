<html>
<?=Template::createHeader("OLSO : Rental Fare ", "manifest.json", ["main.css", "nav.css"], ["app.js"])?>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="icon" href="<?=PROOT?>public/res/olso.png">
    </head>

<body>
    <!-- Desktop Navigation bar -->
    <nav>
        <ul>
            <li><a href="<?=PROOT?>" style="margin-right: 30px;"><img src="<?=PROOT?>public/res/olso.png" alt=""></a></li>
            
            <li>
                <form action="<?=PROOT?>search" method="get" id='search-products'>
                    <select name="location" id="loc">
                        <option value="">Location</option>
                        <option value="Ranchi">Ranchi</option>
                        <option value="Noida">Noida</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Kolkata">Kolkata</option>
                    </select>
                    <input type="search" name="prod" id="prod" placeholder="SEARCH ITEMS"> 
                    <label for=""><i class="fas fa-search" id="submit"></i></label>
                </form>
            </li>
            <?php 
            if(!isset($_SESSION['user'])){
                ?>
                <li class="right"><a href="<?=PROOT?>users/signup"><i class="fas fa-user-plus"></i> SIGNUP</a></li>
                <li class="right"><a href="<?=PROOT?>users/login" ><i class="fas fa-sign-in-alt"></i> LOGIN</a></li>
                <li class="right"><a href="<?=PROOT?>lenders">LEND ON OLSO</a></li>
                <li class="right active"><a href="<?=PROOT?>">HOME</a></li>
                <?php
            }else{
                ?>
                <li class="right"><a href="#" style="color:#3822C2"><?=$fname?></a></li>
                <li class="right"><a href="#" style="background:url('<?=PROOT?>public/res/<?=$profile?>');height:40px; width: 40px;border-radius: 50%;margin-top:5px;background-position:center;backgrond-size: cover;"></a></li>
                <?php
            }
            ?>
        </ul>
    </nav>
    <!-- Desktop Navigation bar ends here -->

</body>

</html>