<?php 

//  model to add the product details into the database
class AddProduct extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function addProduct($data) {
        if(is_uploaded_file($_FILES['product-image']['tmp_name'])){
            $filename = $_FILES['product-image']['name'];
            $dir = ROOT.DS."uploads".DS."products_images".DS;
            extract($data);
            $params = array(
                ":lender_id" => $_SESSION['lender']['id'],
                ":product_name" => $data['p-name'],
                ":brand" => $brand,
                ":model" => $model,
                ":basePrice" => $data['base-price'],
                ":perdaycharge" => $perday,
                ":category" => $cate,
                ":genre" => $genre,
                ":description" => $desc,
                ":product_image" => $filename
            );
            $sql = "INSERT INTO products (p_id, lender_id, title, brand, model, baseprice, perdaycharge, category, genre, description, product_image) VALUES (NULL, :lender_id, :product_name, :brand, :model, :basePrice, :perdaycharge, :category, :genre, :description, :product_image)";
            $this->__insert($sql, $params);
            if($this->error === false) {
                $targetDir = $dir.$_SESSION['lender']['id'].$_FILES['product-image']['name'];
                move_uploaded_file($_FILES['product-image']['tmp_name'], $targetDir);
                return true;
            }else{
                return false;
            }
        }
    } 

}