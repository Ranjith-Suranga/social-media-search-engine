<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="icon" type="image/png" href="../images/favicon.png" >        
        <link rel="stylesheet" type="text/css" href="../css/advertising-main.css">
        <?php
            if (isset($_GET["page"])){
                if ($_GET["page"] === "how-it-works"){
                    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/advertising-how-it-works.css\">\n";
                }else if($_GET["page"] === "costs"){
                    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/advertising-costs.css\">\n";
                }else if( $_GET["page"] === "contact-us" ){
                    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/advertising-contact-us.css\">\n";
                    echo "<script src='https://www.google.com/recaptcha/api.js'></script>";
                }
            }
        ?>
        <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <title>Infoob | Advertisements</title>
    </head>
    <body>
        <header>
            <div class="row">
                <img src="../images/infooblogo_big.png" width="140" height="47" alt="Infoob" />
                <h1>Advertisements</h1>
            </div>
        </header>
