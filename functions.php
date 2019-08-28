<?php


if($_SESSION['userName'] == 'ADMIN' || (!file_exists("pageHashTable.txt")))
{
function convertToTable($inputString)
{
    $rawData = file_get_contents($inputString);

    //return $rawData;
    $rawData1 = explode("<TABLE", $rawData);
    //return $rawData;
    $quickChange = false;
    
    $startPoint = 1;
    
    if(($inputString == "http://www.balsamachining.com/LPM6.ASP") || ($inputString ==  "http://www.balsamachining.com/HPM7.HTM")) 
       {
           $startPoint = 2;
           $quickChange = true;
       }
    if($inputString == "http://www.balsamachining.com/CONES1.ASP")
    {
        $quickChange = true;
    }
    
    for($i = $startPoint; $i < sizeof($rawData1); $i++)
    {
        //return $rawData1[$i];
        $tempData = explode('<TR', $rawData1[$i]);
        //print_r($tempData);
        //echo "<br><br>";
        $eleCount = 0;
        //return $tempData;
        for($o = 1; $o < sizeof($tempData); $o++)
        {
            //$tempData2 = explode('<A HREF="', $tempData[$o]);

            $tempData3 = explode("COLOR=#000000>", $tempData[$o]);
            //print_r($tempData3);
            for($j = 1; $j < sizeof($tempData3); $j++)
            {
                $tempData4 = explode('</FONT>', $tempData3[$j]);
                
                $tempData5 = explode('<A HREF="', $tempData4[0]);

                if(sizeof($tempData5) > 1)
                {
                    $tempData6 = explode('">', $tempData5[1]);
                    $tempData7 = explode(".com", $tempData6[0]);
                    if(sizeof($tempData7) == 1)
                    {
                        $tempData4[0] = '<A HREF="https://www.balsamachining.com'.$tempData6[0].'">'.$tempData6[1];
                    }
                }
                
                $output[($i-$startPoint)][($o-1)][($j-1)] = $tempData4[0];
            }
        }
        
    }
    if($quickChange)
    {
        return $output[0];
    }
    return $output;
}


//print_r(convertToTable("http://www.balsamachining.com/catalog1.asp"));


$mainCatalog = convertToTable("http://www.balsamachining.com/catalog1.asp");

$pageHashTable = array();

$pageHashTable['Estes & Aerotech Low Power'] = "http://www.balsamachining.com/LPM6.ASP";


for($i = 0; $i < sizeof($linkKeys); $i++)
{
$tempString = '';
    $tempData1 = explode(" ", $linkKeys[$i]);
    $tempString = $tempData1[0];
    for($j = 1; $j < sizeof($tempData1); $j++)
    {
        $tempString = $tempString." ".$tempData1[$j];
    }
    $pageHashTable[$tempString] = 0;
}


$mainCatalog = convertToTable("http://www.balsamachining.com/catalog1.asp");

$pageHashTable['Estes '] = convertToTable("http://www.balsamachining.com/LPM6.ASP");

$pageHashTable['Aerotech High Power'] = convertToTable("http://www.balsamachining.com/HPM7.HTM");

$pageHashTable['Kits'] = $mainCatalog[1];

$pageHashTable['Engine Hooks '] = $mainCatalog[2];

$pageHashTable['Recovery Supplies'] = $mainCatalog[3];

$pageHashTable['Low power Body Tubes '] = $mainCatalog[4];

$pageHashTable['Centering Rings '] = $mainCatalog[5];

$pageHashTable['Wood'] = $mainCatalog[6];

$pageHashTable['Misc'] = $mainCatalog[7];

$pageHashTable['Saturn V'] = "http://www.balsamachining.com/saturnv.htm";

$pageHashTable['Cones '] = convertToTable("http://www.balsamachining.com/CONES1.ASP");

$pageHashTable['3'] = "http://www.balsamachining.com/3inchSchoolRkt.htm";

$pageHashTable['original School Rocket'] = "http://www.balsamachining.com/SchoolRkt.htm";

$pageHashTable['Tarc Parts'] = "http://www.balsamachining.com/tarc_parts.htm";


$myFile = fopen("pageHashTable.txt", 'w');
fclose($myFile);
$stringData = serialize($pageHashTable);
file_put_contents("pageHashTable.txt", $stringData);


$_SESSION['pageHashTable'] = $pageHashTable;

}
$string_data = file_get_contents("pageHashTable.txt");
$pageHashTable = unserialize($string_data);
$_SESSION['pageHashTable'] = $pageHashTable;

?>