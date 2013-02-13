<html>
<head>
<title>Foo</title>
</head>
<body>
<?php
include('config.php');
include('dbhelper.php');
include('person.php');
include('project.php');
include('contact.php');

pgConnect();

$persons = getPersonsFromDb();
echo("<h3>Persons</h3>");
echo("<p>" . json_encode($persons) . "</p>");

$projects = getProjectsFromDb();
echo("<h3>Projects</h3>");
echo("<p>" . json_encode($projects) . "</p>");

$p = getContact();
echo("<h3>Contact (hardcoded)</h3>");
echo("<p>" . json_encode($p) . "</p>");

pgClose();
?>
</body>
</html>
