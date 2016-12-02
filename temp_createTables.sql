
SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS locations;
DROP TABLE IF EXISTS systems;
DROP TABLE IF EXISTS characters;
DROP TABLE IF EXISTS games;
DROP TABLE IF EXISTS gameChars;
SET FOREIGN_KEY_CHECKS=1;

CREATE TABLE locations (
	locationID int(11) NOT NULL AUTO_INCREMENT,
	locationName varchar(50) NOT NULL,
	environment varchar(50),
	UNIQUE KEY (locationName),
	PRIMARY KEY (locationID)
) ENGINE=innoDB DEFAULT CHARSET=latin1;


CREATE TABLE systems (
	systemID int NOT NULL AUTO_INCREMENT,
	systemName varchar(50) NOT NULL,
	releaseMonth int(2),
	releaseDay int(2),
	releaseYear int(4),
	unitsSold int(11) NOT NULL,
	introPriceUS float,
	UNIQUE KEY (systemName),
	PRIMARY KEY (systemID)
) ENGINE=innoDB DEFAULT CHARSET=latin1;


CREATE TABLE characters (
	characterID int(11) NOT NULL AUTO_INCREMENT,
	name varchar(50) NOT NULL,
	raceOrSpecies varchar(50),
	homeland int(11) NOT NULL,
	UNIQUE KEY (name),
	FOREIGN KEY (homeland) REFERENCES locations(locationID) ON DELETE SET NULL,
	PRIMARY KEY (characterID)
) ENGINE=innoDB DEFAULT CHARSET=latin1;


CREATE TABLE games (
	gameID int(11) NOT NULL AUTO_INCREMENT,
	gameTitle varchar(50) NOT NULL,
	setting int(11) NOT NULL,
	releaseDay int(2),
        releaseMonth int(2),
        releaseYear int(4),
	releaseSystem int(11) NOT NULL,
	UNIQUE KEY (gameTitle),
	FOREIGN KEY (setting) REFERENCES locations(locationID) ON DELETE SET NULL,
	FOREIGN KEY (releaseSystem) REFERENCES systems(systemID) ON DELETE SET NULL,
	PRIMARY KEY (gameID)
) ENGINE=innoDB DEFAULT CHARSET=latin1;


CREATE TABLE gameChars (
	cid int(11) NOT NULL,
	gid int(11) NOT NULL,
	FOREIGN KEY (cid) REFERENCES characters(characterID) ON DELETE CASCADE,
	FOREIGN KEY (gid) REFERENCES games(gameID) ON DELETE CASCADE,
	PRIMARY KEY (cid, gid)
) ENGINE=innoDB DEFAULT CHARSET=latin1;
