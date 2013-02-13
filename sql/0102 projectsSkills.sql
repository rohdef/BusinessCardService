CREATE TABLE projectSkills (
  projectName TEXT REFERENCES project(name),
  skillName TEXT REFERENCES skill(name),
  PRIMARY KEY (projectName, skillName)
);
