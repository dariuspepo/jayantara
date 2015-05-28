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
$searchWord = $_POST["nilai"];
$searchWord = strtolower($searchWord);
$hitungJumlah = str_split($searchWord);
    echo "<i><b>Hasil dengan Async Javascript. Untuk hasil dengan form, tekan tombol olah</b></i>";
    echo "<br><br>&emsp;Daftar Huruf&emsp; :&emsp;" ;
$x = 0;
if($searchWord==""){ 
    $x = 0;

}
else{

foreach ($hitungJumlah as $thishitungJumlah) {
            echo '<span style="color:blue;font-weight: bold;#text-align:center;background-color:#ffff42">'.strtoupper($thishitungJumlah) . "  " . '</span>';
            
            $x++;
        }
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
?>
