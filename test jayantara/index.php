<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

    <script type="text/javascript">
        function invoAjaxLoadBarangSearch(mydivtext,divname,mode) {
				
				
				
				$(divname).load("ajaxLoad.php", {nilai : $(mydivtext).val(),mymode : mode});
			}
    </script>
<meta charset="utf-8">
<title>Darius Sandatinus For HRD Jayantara</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../style.css">
<!--[if IE]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="php">
<div id="container">
  <div id="main" role="main" class="hellobox">
    <br />
    &emsp;<img src="../img/eject.png" style="width:30px;height:30px;"><t><font size="5px">&emsp;|&emsp;Olah Kata</font><br>
     
    <form method="post" action="index.php">
    <br /><br />
   &emsp; Ketikkan: &emsp;<input onkeyup="javascript:invoAjaxLoadBarangSearch(
                                                           '#wordInput', '#searchPlace', '0')" type="text" pattern=".{3,13}" required title="3 sampai 13 huruf" name="wordSearch" characters" id="wordInput" minlenght="3" maxlength="13"> &emsp;<input type="submit"  value="Olah" />
    
</form>
   
  </div>
  <nav>
    <ul>
          </ul>
  </nav>
  
  <footer>
    <?php
$data = file_get_contents("katadasar.txt"); //read the file
$convert = explode("\n", $data); //create array separate by new line
$convert = array_map('strtolower', $convert);


function factorise ($word) {
        // Take a number, split it into individual letters, and multiply those values together
        // So long as both words use the same value, you can amend the ordering of the factors 
        // as you like

                       $factors = array("e" => 2, "t" => 3, "a" => 5, "o" => 7, "i" => 11,
                        "n" => 13, "s" => 17, "h" => 19, "r" => 23, "d" => 29,
                        "l" => 31, "c" => 37, "u" => 41, "m" => 43, "w" => 47,
                        "f" => 53, "g" => 59, "y" => 61, "p" => 67, "b" => 71,
                        "v" => 73, "k" => 79, "j" => 83, "x" => 89, "q" => 97,
                        "z" => 101);





        $total = 1;

        $letters = str_split($word);
        
        foreach ($letters as $thisLetter) {
                if (isset($factors[$thisLetter])) {
                        
                        $total *= $factors[$thisLetter];
                }
        }

        return $total;
}

$searchWord = $_POST["wordSearch"];
$searchWord = strtolower($searchWord);
$hitungJumlah = str_split($searchWord);
?><div id="searchPlace">
<?php
//$searchWord = "ababababab";
if($searchWord==""){
    
}
else{
//echo '<div id="searchPlace">';
echo "<br><br>&emsp;Daftar Huruf&emsp; :&emsp;" ;
$x = 0;
foreach ($hitungJumlah as $thishitungJumlah) {
            echo '<span style="color:blue;font-weight: bold;#text-align:center;background-color:#ffff42">'.strtoupper($thishitungJumlah) . "  " . '</span>';
            
            $x++;
        }
echo "&emsp; -- &emsp;(" . $x . " Huruf)<br><br>&emsp;Daftar Kata Yang Bisa Disusun &emsp;:<br><br>";
$dict = $convert;

$searchWordFactor = factorise($searchWord);

foreach ($dict as $thisWord) {
        $dictWordFactor = factorise($thisWord);
        $z=0;
        $p=0;
        if (($searchWordFactor % $dictWordFactor) == 0) {
                $y = 0;
                $hitungthisword = str_split($thisWord);
                foreach ($hitungthisword as $thishitungthisword) {
            
                    $y++;
                }
                $z=$y;
                if($a[$z]==""){
                    $a[$z] .= $thisWord;
                }
                else{
                    $a[$z] .= ", " . $thisWord;
                }
            $p++;
        }
}
$resultAkhir = 0;
for ($i=3;$i<14;$i++)  
{
    if($a[$i]==""){}
    else{
        $jumlah = $a[$i];
        $schools_array = explode(",", $jumlah);
        $result = count($schools_array);
        echo '<span style="color:black;font-weight:bold">' . "&emsp;&emsp;&emsp;• ". $i . " Huruf: <br><br>" . '<span>';
        $final = explode(", ", $a[$i]); //create array separate by new line
        echo "<h4>" . '<span style="color:blue;font-weight:bold">';
        $vS = 0;
        foreach ($final as $cetakFinal) {
                    if($vS==0){
                        echo '<span style="text-decoration:underline">' .'<a target="_blank" href="http://kbbi.web.id/' . $cetakFinal . '">'.$cetakFinal . "</a>" . '</span>';
                        $vS++;
                    }else{
                        echo ", " .  '<span style="text-decoration:underline">' .'<a target="_blank" href="http://kbbi.web.id/' . $cetakFinal . '">'.$cetakFinal . "</a>" . '</span>';
                    }
        
                }
        echo '</span>' .  "&emsp; --&emsp;(". $result . " Kata)<br></h4>";    
        $resultAkhir = $resultAkhir + $result;
    }
   
};//end for
     echo "&emsp;Ditemukan&emsp;" . $resultAkhir . "&emsp; Kata";
}//end if
?>   
</div>
     </footer>
  <nav>
    <ul>
          </ul>
  </nav>
  <h3>&emsp;Lihat daftar kata di <a target="_blank" href="katadasar.txt">
sini</a>  
<?php
    $filename = 'katadasar.txt';
    $fileBesar = filesize($filename);
    function FileSizeConvert($bytes)
    {
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
    }
?>
(<?php echo FileSizeConvert($fileBesar);?>)</h3>

</body>
</html>
