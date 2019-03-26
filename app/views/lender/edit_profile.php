<html>
<?=Template::createHeader("OLSO : Lender's Signup ", "manifest.json", ["main.css", "nav.css"], ["app.js", "validation.js"])?>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="icon" href="<?=PROOT?>public/res/olso.png">
    </head>
    <?php 
    $images = IMAGES;
    shuffle($images);
    ?>
    <body>
        <!-- Desktop Navigation bar -->
        <?=Template::lenderNavigation()?>
        <?php
        if($param) {
            extract($param);
        }
        ?>
        
    </body>
</html>