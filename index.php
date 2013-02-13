<html>
<head>
<title>Foo</title>
</head>
<body>
<?php
include('dbhelper.php');
include('person.php');
include('project.php');

pgConnect();

$persons = getPersonsFromDb();
echo("<h3>Persons</h3>");
echo("<p>" . json_encode($persons) . "</p>");

$projects = getProjectsFromDb();
echo("<h3>Projects</h3>");
echo("<p>" . json_encode($projects) . "</p>");

echo("<h3>Contact (hardcoded)</h3>");

pgClose();

$p = new Person();
$p->lastName = "Fischer";
$p->firstName = "Rohde";
$p->address = "Kirkegårdsvej 10 D, 3.-3";
$p->postal = 8000;
$p->city = "Aarhus";
$p->email = "rohdef@rohdef.dk";

echo("<p>" . json_encode($p) . "</p>");
?>
</body>
</html>
