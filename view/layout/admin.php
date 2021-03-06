<html lang="fr">

    <head>

        <!-- 
            Responsive wbesite developed by Lucas WILLEMOT for AZURA
            Based on famous bootstrap Twitter framework, thanks to them !

            Look my personnal website at : http://lucas-willemot.fr
         -->

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>AZURA, boutique de décoration d'intérieur à Blois</title>

        <!-- Bootstrap Core CSS -->
        <link href= <?php echo '"' . BASE_URL . '/webroot/css/vendor/bootstrap.css"'?> rel="stylesheet">

        <!-- Custom CSS -->
        <link href= <?php echo '"' . BASE_URL . '/webroot/css/vendor/metisMenu.min.css"'?> rel="stylesheet">
        <link href= <?php echo '"' . BASE_URL . '/webroot/css/vendor/sb-admin-2.css"'?> rel="stylesheet">
        <link href= <?php echo '"' . BASE_URL . '/webroot/css/admin/admin.css"'?> rel="stylesheet">
        <link href= <?php echo '"' . BASE_URL . '/webroot/font-awesome/css/font-awesome.min.css"'?> rel="stylesheet">
        <?php  
        if(isset($css))
        {
            foreach($css as $key => $value)
                echo($css[$key]); 
        }
        ?>      

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <?php include(ROOT.DS."view/includes/admin_menu.php"); ?>

        <!-- Page Content -->
        <?php echo $content_for_layout; ?>
        <!-- /.container -->

        <!-- jQuery -->
        <script src= <?php echo '"' . BASE_URL .  '/webroot/js/vendor/jquery.js"'?>></script>

        <!-- Bootstrap Core JavaScript -->
        <script src= <?php echo '"' . BASE_URL .  '/webroot/js/vendor/bootstrap.min.js"'?>></script>
        <script src= <?php echo '"' . BASE_URL .  '/webroot/js/vendor/metisMenu.min.js"'?>></script>
        <script src= <?php echo '"' . BASE_URL .  '/webroot/js/vendor/sb-admin-2.js"'?>></script>

        <!-- Custom Scripts -->
        <?php
        if(isset($js))
        {
            foreach($js as $key => $value)
                echo($js[$key]);
        }
        ?>

    </body>

</html>