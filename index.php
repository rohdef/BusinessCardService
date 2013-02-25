<?php
header('Content-type: application/json');

require('config.php');
require('dbhelper.php');
require('person.php');
require('resource.php');
require('project.php');
require('contact.php');
require('skill.php');

#$dataVersion = $_GET['dataVersion'];
$type = $_GET['type'];
$data = null;

pgConnect();

switch($type) {
  case 'projects':
    $data = getProjectsFromDb();
    break;
  case 'references':
    $data = getPersonsFromDb();
    break;
  case 'skills':
    $data = getSkillsFromDb();
    break;
  case 'contact':
    $data = getContact();
    break;
  default:
    die("{'error':'No valid type selection'}");
}

echo(json_encode($data));

pgClose();
?>
