<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="http://localhost/HTTTSX/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">


    <!-- JS, Popper.js, and jQuery -->
    <link rel="stylesheet" href="./public/bootstrap/css/bootstrap.min.css">
    <script src="./public/bootstrap/js/jquery.min.js"></script>
    <script src="./public/js/bootstrap.min.js"></script>

    <script src="./public/js/popper.min.js"></script>
    <link rel="stylesheet" href="./public/font/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="./public/font/all.css"> -->
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Template style -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>f
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <title>Trang chủ</title>

    <!-- <style>
        div{padding: 20px;}
        #header,#footer{background-color: yellow;}
    </style> -->
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" style="position: relative;">
    <?php
    require_once "./mvc/views/pages/header.php";
    ?>
    <?php
    require_once "./mvc/views/pages/" . $data["Page"] . ".php";
    ?>
    <?php
    require_once "./mvc/views/pages/footer.php";
    ?>
</body>

</html>