<?php 

    
    include("head.php");

    include("functions.php");


    if(isset($_GET['page']))
    {
    if ($_GET['page'] == 'home')
    {
        include("home.php");
    }
        else
        {
        echo "<script>var pageGo = 1</script>";
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