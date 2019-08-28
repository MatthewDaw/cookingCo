<?php 

    
    include("head.php");

    ini_set('memory_limit', '-1');

    include("functions.php");

    echo "<script>var pageGo = 0</script>";
    echo "<script>var pageToGo</script>";

    if(isset($_GET['page']))
    {
    if ($_GET['page'] == 'home')
    {
        include("home.php");
    }
        else
        {
        echo "<script>var pageGo = 1</script>";
        echo "<script>var pageToGo = '".$_GET['page']."'</script>";
        echo "<div style='visibility:hidden'>";
        //echo file_get_contents("http://www.balsamachining.com/catalog1.asp");
        echo "</div>";
        }
        
    }
    else
    {
        include("home.php");
    }


?>




<?php


    include("foot.php");

?>