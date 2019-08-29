<?php 

    include("functions.php");

    include("head.php");   

    if(isset($_SESSION['id']) && ($_SESSION['id'] != ''))
    {
        include("navbarSI.php");

        include("signedIn.php");
    }
    else
    {
        include("navbarNSI.php");
                if(isset($_GET['page']))
        {
            if ($_GET['page'] == 'home'){

                include("home.php");
            }
            else if($_GET['page'] == 'howItWorks'){

                include('howItWorks.php');
            }
            else if($_GET['page'] == 'postedMeal'){
                include('postedMeal.php');
            }
            else if($_GET['page'] == 'requestMeal'){
                include('requestMeal.php');
            }

        }
    }

    include("foot.php");

?>