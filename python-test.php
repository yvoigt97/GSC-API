<?php
$uri = "https://berlinonbike.de";
$start_date = "2019-05-01";
$end_date = "2019-05-30";
echo "<h3>";
echo $uri." ".$start_date." ".$end_date;
echo "</h3><br>";
exec("python3 --version 2>&1", $out, $result);
exec("python3 /www/htdocs/w010903c/gsc.digitalagenten.com/GSC-API-master/search_analytics_api_sample.py ".$uri." ".$start_date." ".$end_date." 2>&1", $out, $result);
echo "Returncode: " .$result ."<br>";
echo "Ausgabe des Scripts: " ."<br>";
echo "<pre>"; print_r($out);
?>
