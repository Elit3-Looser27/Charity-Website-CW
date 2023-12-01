CREATE TABLE donation_info (
  id int NOT NULL IDENTITY(1,1),
  name varchar(128) NOT NULL,
  email varchar(255) NOT NULL,
  gender varchar(10) NOT NULL, -- Changed from ENUM
  address varchar(255) NOT NULL,
  phone_number varchar(15) NOT NULL,
  charity varchar(255) NOT NULL,
  donation_type varchar(255) NOT NULL,
  specify_type varchar(255) NOT NULL,
  amount decimal(10,2) NOT NULL,
  payment_method varchar(255) NOT NULL,
  card_number varchar(16) NOT NULL,
  card_expiry date NOT NULL,
  cvv int NOT NULL,
  PRIMARY KEY (id),
  UNIQUE (card_number)
);

-- Note: You may need to adjust ENUM 'gender' to a varchar and manage allowed values through application logic or a lookup table.
CREATE TABLE feedback (
  id int NOT NULL IDENTITY(1,1),
  name varchar(255) NULL,
  email varchar(255) NULL,
  message varchar(MAX) NULL, -- Changed from TEXT
  timestamp datetime NOT NULL DEFAULT GETDATE(), -- Changed from TIMESTAMP
  PRIMARY KEY (id)
);
