/* this is definitely in progress for now!!! 11/3 - DZ */

/***************************************
* CHARACTER ENTITY
***************************************/
DROP TABLE IF EXISTS 'characters';
CREATE TABLE 'characters' (
	'characterID' int(11) NOT NULL AUTO_INCREMENT,
	'fName' varchar(50) NOT NULL,
	'lName' varchar(50),
	'homeland' int(11) NOT NULL,
	-- Race?
	FOREIGN KEY ('homeland') REFERENCES locations('locationID'),
	PRIMARY KEY ('characterID')
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/**************************************
* GAMES ENTITY
**************************************/
DROP TABLE IF EXISTS 'games';
CREATE TABLE 'games' (
	'gameID' int(11) NOT NULL AUTO_INCREMENT,
	'gameTitle' varchar(50) NOT NULL,
	'releaseDate' date NOT NULL,
	'systemRelease' int(11) NOT NULL,
	FOREIGN KEY ('systemRelease') REFERENCES systems('systemID'),
	PRIMARY KEY ('gameID')
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/**************************************
* SYSTEMS ENTITY
**************************************/
DROP TABLE IF EXISTS 'systems';
CREATE TABLE 'systems' (
	'systemID' int(11) NOT NULL AUTO_INCREMENT,
	'systemName' varchar(50) NOT NULL,
	PRIMARY KEY ('systemID')
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/***************************************
* LOCATIONS ENTITY
***************************************/
DROP TABLE IF EXISTS 'locations';
CREATE TABLE 'locations' (
	'locationID' int(11) NOT NULL AUTO_INCREMENT,
	'locationName' varchar(50) NOT NULL,

	PRIMARY KEY ('locationID')
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


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
