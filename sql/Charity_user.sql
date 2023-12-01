CREATE TABLE [user] (
  id int NOT NULL IDENTITY(1,1),
  name varchar(128) NOT NULL,
  email varchar(255) NOT NULL,
  password_hash varchar(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE (email)
);

-- Note: The data types used in MySQL are generally compatible with SQL Server. 
-- The main change here is converting AUTO_INCREMENT to IDENTITY.
