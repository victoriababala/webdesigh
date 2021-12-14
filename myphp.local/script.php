<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php
echo 'Ready succesfully<br><br>';

$note = $_POST['note'];
$calendar = $_POST['calendar'];
$item = [$note => $calendar];
$url = 'file.txt';


$readJSONFile = file_get_contents($url);
$array = json_decode($readJSONFile);

if (!$array) $array = [];

array_push($array, $item);


usort($array, function($a, $b) { 
    return $a->date > $b->date ? -1 : 1; 
});    

print_r($array); 

$array = json_encode($array);


file_put_contents($url, $array);
?>


  </body>
</html>