<?php
class Project {
  public $name, $shortDescription, $fullDescription, $teamWork, $startDate, $endDate, $skills, $references;
}

function getProjectsFromDb() {
  $skillSubquery = "(SELECT array(SELECT s.skillName FROM projectskills s where projectname=p.name))";
  $referenceSubquery = "(SELECT array(SELECT s.personemail FROM projectpersons s where projectname=p.name))";
  $query = "SELECT p.*, $skillSubquery AS skills, $referenceSubquery AS references FROM project p;";
  $projects = array();

  $result = pg_query($query) or pgPrintError(__file__, __line__, $query, pg_last_error());

  while ($row = pg_fetch_object($result, null, "Project")) {
    $skills = $row->skills;
    $row->skills = parseDbArray($skills);

    $references = $row->references;
    $row->references = parseDbArray($references);

    $projects[] = $row;
  }

  pg_free_result($result);

  return $projects;
}
?>
