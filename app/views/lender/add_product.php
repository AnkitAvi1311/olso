<html>
<?=Template::createHeader("OLSO : Add Details and Products ", "manifest.json", ["main.css", "nav.css", "res.css"], ["app.js"])?>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="icon" href="<?=PROOT?>public/res/olso.png">
    </head>
    
    <body>
        <!-- Desktop Navigation bar -->
        <?=Template::lenderNavigation()?>
        
        <!-- Section to put the form so that lender can add items for lending -->
        <div class="row default-padd">
            <div class="col-12">
                <form action="<?=PROOT?>lenders/addProduct" method="post" enctype="multipart/form-data" class="product">
                    <div class="row">
                        <div class="col-4">
                            <input type="file" name="product-image" id="product-image" required="required" style="display: none;">
                            <div class="display" style="width: 100%;height: 400px;background:url('<?=PROOT?>public/res/group.png');background-repeat: no-repeat;background-position:center;background-size: 50%;cursor:pointer;" id="p-display">
                            </div>
                            <div class="actual-display" id="actual-display" style="display:none;">
                                <img src="" alt="" id="actual-product-image" style="width:100%;">
                            </div>
                            <button class="select" style="cursor:pointer;width:100%;padding:15px 15px;border:none;color:grey;border-radius: 5px;margin-top: 20px;background:rgba(218,218,218,.4)">CHOOSE PRODUCT IMAGE</button>
                        </div>
                        <div class="col-4">
                            <div class="product-1">
                                <h2 style="margin:0px;margin-bottom:20px;color:grey;">Add Products</h2>
                                <div>
                                <label for="p-name">Product Details</label>
                                <input type="text" required="required" name="p-name" placeholder="Product Title" required="required">
                                </div>
                                <div>
                                    <input type="text" name="brand" id="brand" placeholder="Brand Name" required="required">
                                </div>
                                <div>
                                    <input type="text" name="model" id="modal" placeholder="Model Number / ID "> 
                                </div>
                                <div>
                                    <label for="base-price">Base Price (Rs.)</label>
                                    <input type="number" name="base-price" id="base-price" required="required" placeholder="200">
                                </div>                 
                                <div>
                                    <label for="perday">Per-day charge (Rs.)</label>
                                    <input type="number" name="perday" id="perday" placeholder="0">
                                </div>               
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="product-1">
                                <h2 style="margin:0px;margin-bottom:20px;color:grey;" id="disp-none">&nbsp</h2>
                                <div>
                                    <label for="cate">Category of the product</label>
                                    <select name="cate" id="cate" requried="required" name="category">
                                        <option value="" selected>Select Category</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="cars">Cars</option>
                                        <option value="motorcycle">Motorcycle</option>
                                        <option value="home appliances">Home Appliances</option>
                                        <option value="games and console">Games and Console</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="genre">Genre of the product (optional)</label>
                                    <select name="genre" id="genre" name="genre">
                                        <option value="" selected>Select Genre</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="Party">Party</option>
                                        <option value="Hiking">Hiking</option>
                                        <option value="Sports">Sports</option>
                                        <option value="Outdoor">Outdoor</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="desc">Description and Features</label>
                                    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="This is the description of the product and below are its features.

1. Feature 1
2. Feature 2
3. Feature 3"></textarea>
                                </div>
                                <div>
                                    <input type="submit" value="Add Product" name="submit" style="width:100%;padding:15px;font-size:14px;background:#414141;color:white;border:none;border-radius: 5px;cursor:pointer;">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if($param !==null) {
            ?>
            <div class="success-addition">
                Successfully added the new product.
            </div>
            <?php
        }
        ?>
        <script>
            window.onload = () => {
                let imagebutton = document.getElementById("product-image");
                let display = document.getElementById("p-display");
                display.onclick = ()=> {
                    imagebutton.click();
                }
                document.getElementsByClassName("select")[0].onclick = ()=> {
                    imagebutton.click();
                }
                imagebutton.onchange = (e)=> {
                    let reader = new FileReader();
                    if(imagebutton.files || imagebutton.files[0]){
                        reader.onload = (e)=> {
                            display.style.display = "none";
                            document.getElementById('actual-display').style.display = "block";
                            let actualimage = document.getElementById("actual-product-image");
                            actualimage.src = e.target.result;
                        }
                        reader.readAsDataURL(imagebutton.files[0]);
                    }
                }
                setTimeout(() => {
                    document.getElementsByClassName('success-addition')[0].style.display = "none";
                }, 3000);
            }
        </script>
    </body>
</html>
