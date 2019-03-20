<html>
<?=Template::createHeader("OLSO : Add Details and Products ", "manifest.json", ["main.css", "nav.css", "lender.css", "res.css"], ["app.js"])?>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    
    <body>
        <!-- Desktop Navigation bar -->
        <?=Template::lenderNavigation()?>
        <div>
            <div class="signup">
                <h1 style="color:#6A4DFF">Add Details</h1>
                <form action="<?=PROOT?>lenders/adddetails" method="post" id="myform">
                <p style="color:grey;font-size: 15px;">Contact Details</p>
                    <div>
                        <input type="text" name="address" id="address" required="required">
                        <label for="address">Address</label>
                    </div>                    
                    <div>
                        <input type="text" name="city" id="city" required="required">
                        <label for="city">City</label>
                    </div>
                    <div>
                        <input type="text" name="state" id="state" required="require">
                        <label for="state">State</label>
                    </div>
                    <p style="color:grey;font-size: 15px;">Bank Details</p>
                    <div>
                        <input type="text" name="PAN" id="PAN" required="required">
                        <label for="PAN">PAN Number</label>
                    </div>
                    <div>
                        <input type="text" name="gst" id="gst" required="required">
                        <label for="gst">GST IN</label>
                    </div>
                    <div>
                        <input type="number" id="account" required="required" name="account">
                        <label for="account">Bank Account Number</label>
                    </div>
                    <div>
                        <input type="text" name="ifsc" id="ifsc" required="required">
                        <label for="ifsc">IFSC Code</label>
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
                    <div>
                        <input type="submit" value="SUBMIT" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
