<div id="main-nav" class="row">
    <ul>
        <?php
        $page = 'overview.php';
        $listItems = ["<strong>Overview</strong>", "<a href=\"index.php?page=how-it-works\">How it works</a>", "<a href=\"index.php?page=costs\">Costs</a>"];
        if (isset($_GET["page"])) {
            switch ($_GET["page"]) {
                case "how-it-works":
                    $listItems[0] = "<a href=\"index.php\">Overview</a>";
                    $listItems[1] = "<strong>How it works</strong>";
                    $page = "how-it-works.php";
                    break;
                case "costs":
                    $listItems[0] = "<a href=\"index.php\">Overview</a>";
                    $listItems[2] = "<strong>Costs</strong>";
                    $page = "costs.php";
                    break;
                case "contact-us":
                    $listItems[0] = "<a href=\"index.php\">Overview</a>";             
                    $page = "contact-us.php";
                    break;
            }
        }
        foreach ($listItems as $value) {
            echo "<li>{$value}</li>";
        }
        ?>
    </ul>
</div>
<div class="line"></div>
<?php
        include $page;
?>
