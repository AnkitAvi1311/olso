<html>
<?=Template::createHeader("OLSO : Signup", "manifest.json", ["main.css", "nav.css"], ["app.js"])?>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>

<body>
    <!-- Desktop Navigation bar -->
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
                <li class="right  active"><a href="<?=PROOT?>users/signup"><i class="fas fa-user-plus"></i> SIGNUP</a></li>
                <li class="right"><a href="<?=PROOT?>users/login" ><i class="fas fa-sign-in-alt"></i> LOGIN</a></li>
                <li class="right"><a href="<?=PROOT?>lenders">LEND ON OLSO</a></li>
                <li class="right"><a href="<?=PROOT?>">HOME</a></li>
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
    
    <div class="signup">
        <h1 style="color:#6A4DFF">Signup</h1>
        <form action="<?=PROOT?>users/signup" method="post" id="myform">
            <div>
                <input type="text" name="fname" id="fname" required = "required">
                <label for="fname">Full Name</label>
            </div>
            <div>
                <input type="email" name="email" id="email" required="required">
                <label for="email">Email Address</label>
            </div>
            <div>
                <input type="password" name="password" id="password" required="required">
                <label for="password">Password</label>
            </div>
            <div>
                <input type="file" name="profile" id="profile" style="display:none;">
                <p style="padding: 0px 15px;font-size: 15px;">Choose a profile picture</p>
                <div id="p-display" style="height:125px; width: 125px;border: 1.5px solid lightgrey;margin: auto;border-radius: 4px;"></div>
                <div id="p-button" style="width:125px;text-align:center;margin:5px auto;padding: 5px 10px;font-size: 13px;cursor: pointer;border: 1px solid black;border-radius:4px;">Select</div>
            </div>
            <!-- Error and message checking -->
            <div>
                <?php
                if(isset($_GET['error'])){
                    ?>
                    <p style="color:red;font-size: 13px;padding: 0px 15px"><?=$_GET['error']?></p>
                    <?php
                }else if(isset($_GET['msg'])){
                    ?>
                    <p style="color: green;font-size:13px;padding:0px 15px;"><?=$_GET['msg']?></p>
                    <?php
                }
                ?>
            </div>
            <div>
                <input type="submit" value="SIGNUP" name="submit">
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