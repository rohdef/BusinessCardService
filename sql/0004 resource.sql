CREATE TABLE "resource" (
  url TEXT PRIMARY KEY,
  "type" TEXT,
  "projectName" TEXT REFERENCES project(name)
);
