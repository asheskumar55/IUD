/*singleCountry*/

CREATE PROCEDURE singleCountry(IN countryId INT(11))
BEGIN
SELECT * FROM tbl_country WHERE country_id=countryId;
END

/* insert COuntry*/
CREATE PROCEDURE insertCOuntry(IN countryName varchar(250))
BEGIN
INSERT INTO tbl_country(country_name) VALUES (countryName);
END

/* selectCountry */
CREATE PROCEDURE selectCountry()
BEGIN
SELECT * FROM tbl_country ORDER BY country_id;
END

/* UpdateCountry */
CREATE PROCEDURE updateCountry(IN countryId INT(11), countryName varchar(250))
BEGIN
UPDATE tbl_country SET country_name=countryName WHERE country_id=countryId;
END

/* deleteCountry */
CREATE PROCEDURE deleteCountry(IN countryID INT(11))
BEGIN
DELETE FROM tbl_country WHERE country_id=countryID;
END
