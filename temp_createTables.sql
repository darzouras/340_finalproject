/* this is definitely in progress for now!!! 11/3 - DZ */

/***************************************
* CHARACTER ENTITY
***************************************/
DROP TABLE IF EXISTS 'characters';
CREATE TABLE 'characters' (
	'characterID' int(11) NOT NULL AUTO_INCREMENT,
	'characterName' varchar(50) NOT NULL,
	'homeland' /* foreign key: locationId */

	PRIMARY KEY ('characterID')
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/**************************************
* GAMES ENTITY
**************************************/
DROP TABLE IF EXISTS 'games';
CREATE TABLE 'games' (
	'gameID' int(11) NOT NULL AUTO_INCREMENT,
	'gameTitle' varchar(50) NOT NULL,
	'yearReleased' int(11) NOT NULL,
	'systemRelease' /* foreign key: systemID */

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

) ENGINE=MyISAM DEFAULT CHARSET=latin1;
