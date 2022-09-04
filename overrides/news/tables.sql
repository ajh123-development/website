DROP TABLE IF EXISTS articles;
CREATE TABLE articles
(
  id              smallint unsigned NOT NULL auto_increment,
  publicationDate date NOT NULL,                              # When the article was published
  title           varchar(255) NOT NULL,                      # Full title of the article
  summary         text NOT NULL,                              # A short summary of the article
  content         mediumtext NOT NULL,                        # The HTML content of the article
  author          varchar(255) NOT NULL,                      # The author of the post
  linkedApp       smallint unsigned NULL DEFAULT NULL,        # The app that is linked to the article

  PRIMARY KEY     (id)
);

DROP TABLE IF EXISTS apps;
CREATE TABLE apps
(
  id              smallint unsigned NOT NULL auto_increment,
  name            varchar(255) NOT NULL,                      # Full name of the app
  version         text NOT NULL,                              # The version of the app
  type            text NOT NULL,                              # The version of the app
  dateTime        text NOT NULL,                              # The date and type of the app
  rawJson         mediumtext NOT NULL,                        # The json definition of the app

  PRIMARY KEY     (id)
);