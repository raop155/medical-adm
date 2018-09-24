<?php 
header('Content-Type: text/html; charset=UTF-8');
$file = "medical-report2.csv";
$handle = fopen($file, "r");
$c = 0;
while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
    $filesop = array_map("utf8_encode", $filesop); //added
 //$name = $filesop[0];
 //$email = $filesop[1];

    $disease = $filesop[0];
    echo $disease . '<br/>';

 //$sql = mysql_query("INSERT INTO xls (name, email) VALUES ('$name','$email')");
}

$test = "Nuñez";
echo $test;

if ($sql) {
    echo "You database has imported successfully";
} else {
    echo "Sorry! There is some problem.";
}
?>
</body>
</html>

