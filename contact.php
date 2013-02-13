<?php
function getContact() {
  $p = new Person();
  $p->lastName = "Fischer";
  $p->firstName = "Rohde";
  $p->address = "Kirkegårdsvej 10 D, 3.-3";
  $p->postal = 8000;
  $p->city = "Aarhus";
  $p->email = "rohdef@rohdef.dk";

  return $p;
}
?>
