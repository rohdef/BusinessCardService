<?php
class Person {
  public $firstName, $lastName, $address, $postal, $city, $email, $phone;
}

function getPersonsFromDb() {
  $query = "SELECT * FROM person;";
  $persons = array();

  $result = pg_query($query) or pgPrintError(__file__, __line__, $query, pg_last_error());

  while ($row = pg_fetch_object($result, null, "Person")) {
    $persons[] = $row;
  }

  pg_free_result($result);

  return $persons;
}
?>
