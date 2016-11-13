--Inserts a new location into the locations table
INSERT INTO locations(locationName, environment) VALUES ([nameInput],[environmentInput]);

--Inserts a new system into the systems table
INSERT INTO systems(systemName, releaseMonth, releaseDay, releaseYear, unitsSold, introPriceUS) VALUES ([nameInput], [monthInput],[dayInput],[yearInput], [unitsSoldInput], [introPriceInput]);

--Inserts a new character into the characters table - references foreign key of homeland location
INSERT INTO characters(name, raceOrSpecies, homeland) VALUES ([nameInput], [raceOrSpeciesInput], (SELECT locationID FROM locations WHERE locationName=[homelandInput]));

--Inserts a new game into the game table - references foreign key of the setting location and the release system
INSERT INTO games(gameTitle, setting, releaseDay, releaseMonth, releaseYear, releaseSystem) VALUES ([nameInput], (SELECT locationID FROM locations WHERE locationName=[settingInput]),
	dayInput, monthInput, yearInput, (SELECT systemID FROM systems WHERE systemName=[systemInput]));

--Inserts new game/character relationship	
INSERT INTO gameChars (cid, gid) VALUES ((SELECT characterID FROM characters WHERE name=[nameInput]), (SELECT gameID FROM games WHERE gameTitle=[gameInput]));

--Delete location from the locations table based on the name
DELETE FROM locations WHERE locationName=[nameDeleteInput]; 

--Delete system from systems table based on the system name
DELETE FROM systems WHERE systemName=[systemDeleteInput]; 

--Deletes a character from the characters table based on the name
DELETE FROM characters WHERE name=[nameDeleteInput]; 

--Deletes a game from the games table based on the game title
DELETE FROM games WHERE gameTitle=[gameDeleteInput]; 

--Deletes an entry from the gameChars
--It seems far more likely that for the gameChars table a character would be entered for a game incorrectly
DELETE FROM gameChars WHERE cid=(SELECT characterID FROM characters WHERE name=[characterDeleteInput]);

--Updates number of units sold for the matching system
UPDATE systems SET unitsSold=[unitsSoldInput] WHERE systemName=[systemNameInput];

--Updates the release date of a game for the matching title
UPDATE games SET releaseDay=[dayInput], releaseMonth=[monthInput], releaseYear=[yearInput] WHERE gameTitle=[gameInput];

--Updates the name of an environment with a new name
UPDATE locations SET environment=[newEnvironmentInput] WHERE environment=[oldEnvironmentInput];

--Updates the race or species info of the matching character
UPDATE characters SET raceOrSpecies=[raceOrSpeciesInput] WHERE name=[nameInput];

--Select and display location names of locations with a certain environment type
SELECT locationName FROM locations WHERE environment=[environmentInput] ORDER BY locationName;

--Display system name, release year, and units sold for systems exceeding input number sold
SELECT systemName, releaseYear, unitsSold FROM systems WHERE unitsSold>[unitSoldInput] ORDER BY unitsSold DESC;

--Display name of characters with a specific homeland
SELECT name FROM characters WHERE homeland=(SELECT locationID FROM locations WHERE locationName=[homelandInput]) ORDER BY name;

--Display game and release year of all games released for a system ordered by release date
SELECT game, releaseYear FROM games WHERE releaseSystem=(SELECT systemID FROM systems WHERE systemName=[systemInput]) ORDER BY releaseYear, releaseMonth, releaseDay;

--Display characters appearing in the selected game
SELECT name FROM characters INNER JOIN gameChars ON gameChars.gid = games.gameID INNER JOIN characters ON characters.characterID = gameChars.cid WHERE games.gameTitle=[gameInput] ORDER BY name;

--Display games that a character appears in
SELECT gameTitle FROM games INNER JOIN gameChars ON gameChars.cid = characters.characterID INNER JOIN games ON games.gameID = gameChars.gid WHERE characters.name=[nameInput] ORDER BY releaseYear, gameTitle;


