<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_admincp.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <title>Admin CP</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
    <!-- Biểu đồ morris -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <?php
        include("config/config.php");
        include("modules/header.php");
        include("modules/menu.php");
        include("modules/main.php");
        include("modules/footer.php");
        ?>
    </div>
    <script>
        // CKEditor 5
        CKEDITOR.replace('tomtat');
        CKEDITOR.replace('noidung');
        
    </script>
</body>

</html>