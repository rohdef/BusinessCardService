CREATE TABLE projectPersons (
  projectName TEXT REFERENCES project(name),
  personEmail TEXT REFERENCES person(email),
  PRIMARY KEY (projectName, personEmail)
);
