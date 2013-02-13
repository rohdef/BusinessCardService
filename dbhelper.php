<?php
$dbconn = null;

function pgConnect() {
  global $dbconn, $host, $db, $user, $pass;
  $dbconn = pg_connect("host=$host dbname=$db user=$user password=$pass");
}

function pgClose() {
  global $dbconn;
  pg_close($dbconn);
}

function parseDbArray($arr) {

  preg_match('/^{(.*)}$/', $arr, $matches);
  $phpArr = str_getcsv($matches[1]);

  $i = count($phpArr)-1;

  for ($i = count($phpArr)-1; $i >= 0; $i--) {
    if ($phpArr[$i] == null) unset($phpArr[$i]);
  }

  return $phpArr;
}


function pgPrintError($file, $line, $query, $error) {
  die("<p>Error occured $file:$line with the query '$query'</p><p>Error message: $error</p>");
}
?>
