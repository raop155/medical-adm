<?php
header('Content-Type: text/html; charset=utf-8');

 $file = "medical-report2.csv";
 $handle = fopen($file, "r");
 $c = 0;
 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
 {
 //$name = $filesop[0];
 //$email = $filesop[1];

 echo $filesop[0].'<br/>';

 //$sql = mysql_query("INSERT INTO xls (name, email) VALUES ('$name','$email')");
 }

 if($sql){
 echo "You database has imported successfully";
 }else{
 echo "Sorry! There is some problem.";
 }
 ?>