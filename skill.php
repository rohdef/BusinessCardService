<?php
class Skill {
  public $name, $description, $skillType, $projects
}

function getSkillsFromDb() {
  $projectSubquery = "(SELECT array(SELECT p.projectName FROM projectskills p where skillname=s.name))";
  $query = "SELECT p.*, $projectSubquery AS projects FROM skill s;";
  $skills = array();

  $result = pg_query($query) or pgPrintError(__file__, __line__, $query, pg_last_error());

  while ($row = pg_fetch_object($result, null, "Project")) {
    $projects = $row->projects;
    $row->references = parseDbArray($projects);

    $skills[] = $row;
  }

  pg_free_result($result);

  return $skills;
}
?>
