<?php
class Resource {
  public $type, $url;
}

function getResourcesFromDb($name) {
  global $dbconn;

  $query = "SELECT r.type, r.url FROM resource r WHERE r.\"projectName\"=$1;";
  $resources = array();

  pg_prepare($dbconn, "", $query) or pgPrintError(__file__, __line__, $query, pg_last_error());
  $result = pg_execute($dbconn, "", array($name));

  while ($row = pg_fetch_object($result, null, "Resource")) {
    $resources[] = $row;
  }

  pg_free_result($result);

  return $resources;
}
?>
