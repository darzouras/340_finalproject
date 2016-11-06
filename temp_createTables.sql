/* this is definitely in progress for now!!! 11/3 - DZ */

/***************************************
* CHARACTER ENTITY
***************************************/
DROP TABLE IF EXISTS 'characters';
CREATE TABLE characters (
	characterID int NOT NULL AUTO_INCREMENT,
	name varchar(50) NOT NULL,
	raceOrSpecies varchar(50),
	homeland int NOT NULL,
	UNIQUE KEY (name),
	FOREIGN KEY (homeland) REFERENCES locations(locationID),
	PRIMARY KEY (characterID)
) ENGINE=innoDB DEFAULT CHARSET=latin1;

/**************************************
* GAMES ENTITY
**************************************/
DROP TABLE IF EXISTS 'games';
CREATE TABLE games (
	gameID int NOT NULL AUTO_INCREMENT,
	gameTitle varchar(50) NOT NULL,
	releaseDay int,
        releaseMonth int,
        releaseYear int,
	releaseSystem int,
	UNIQUE KEY (gameTitle),
	FOREIGN KEY (releaseSystem) REFERENCES systems(systemID),
	PRIMARY KEY (gameID)
) ENGINE=innoDB DEFAULT CHARSET=latin1;

/**************************************
* SYSTEMS ENTITY
**************************************/
DROP TABLE IF EXISTS 'systems';
CREATE TABLE systems (
	systemID int NOT NULL AUTO_INCREMENT,
	systemName varchar(50) NOT NULL,
	releaseMonth int,
	releaseDay int,
	releaseYear int,
	unitsSold int NOT NULL,
	introPriceUS float,
	UNIQUE KEY (systemName),
	PRIMARY KEY (systemID)
) ENGINE=innoDB DEFAULT CHARSET=latin1;

/***************************************
* LOCATIONS ENTITY
***************************************/
DROP TABLE IF EXISTS 'locations';
CREATE TABLE locations (
	locationID int NOT NULL AUTO_INCREMENT,
	locationName varchar(50) NOT NULL,
	environment varchar(50),
	UNIQUE KEY (locationName),
	PRIMARY KEY (locationID)
) ENGINE=innoDB DEFAULT CHARSET=latin1;


/***************************************
* GAME-CHARS MANY-TO-MANY RELATIONSHIP TABLE
***************************************/
DROP TABLE IF EXISTS 'gameChars';
CREATE TABLE 'gameChars' (
	'cid' int(11) NOT NULL,
	'gid' int(11) NOT NULL,
	FOREIGN KEY ('cid') REFERENCES characters('characterID'),
	FOREIGN KEY ('gid') REFERENCES games('gameID')
	PRIMARY KEY ('cid', 'gid')
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
