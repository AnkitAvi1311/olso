<?php

class Profile 
{

    //  function to return the current month's earning
    public static function getInfo() 
    {
        $user = new LenderProfileModel();
        return $user->getAllInfo();
    }

    //  function to get all the products added by a lender
    public function getProducts() 
    {
        $prod = new LenderProfileModel();
        $stmt = $prod->getAllProducts();
        if($stmt->rowCount() > 0){
            ?>
            <div class="row">
                <?php
                while($row = $stmt->fetch()){
                    ?>
                    <div class="col-3">
                        <div class="lender-product-display">
                            <a href="<?=PROOT?>lenders/product?id=<?=$row['p_id']?>&lender_id=<?=$_SESSION['lender']['id']?>">
                                <div class="product-image-display" style="background:url('<?=PROOT?>uploads/products_images/<?=$_SESSION['lender']['id']?><?=$row['product_image']?>');background-repeat: no-repeat;background-size: cover;background-position: center 0px;"></div>
                            </a>
                            <p><b><?=$row['title']?></b></p>
                            <p>Base Cost : Rs. <?=$row['baseprice']?> </p>
                            <div class="remove-product" id="<?=$row['p_id']?>">
                                <button class="del-product">Delete this product</button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }else{
            ?>
            <div class="no-prod">
                <h3 style="position: absolute;left: 50%;
                top: 90%;transform:translate(-50%,-50%);color:#6A4DFF;font-family:'Varela Round', sans-serif;width:100%;text-align:center;">Nothing Here</h3>
            </div>
            <div style="text-align:center;margin-bottom:50px;">
                <a href="<?=PROOT?>lenders/addproduct" style="padding: 12px 30px;background: #6A4DFF;color:white;text-decoration: none;">Add Product</a>
            </div>
            <?php
        }
    }

    public static function getRating() {
        $lender = new LenderProfileModel();
        $rating = $lender->calculateRating();
        return $rating;
    }

}
