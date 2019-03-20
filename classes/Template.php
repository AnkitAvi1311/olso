<?php 

class Template {

    //  function to dynamically create the header section 
    public static function createHeader($title, $manifest=null, $css=null, $scripts=null) {
    ?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$title?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <?php
        if($manifest!==null){
        ?>
    <link rel="manifest" href="<?=PROOT?>manifest.json">
        <?php
        if($css!==null) {
            foreach($css as $file) {
        ?>
<link rel="stylesheet" href="<?=PROOT?>public/css/<?=$file?>">
        <?php        
            }
        }
        if($scripts!==null){
            foreach($scripts as $script){
        ?>
<script src="<?=PROOT?>public/js/<?=$script?>"></script>
        <?php
            }
        }
        }
    }

    public static function lenderNavigation() {
        ?>
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
        <?php
    }

}