/******************************************************
-- Doel: Opvragen van alle records uit de tabellen Magazijn
--       en Product
-- Versie: 01
-- Datum:  24-10-2024
-- Auteur: Arjan de Ruijter
******************************************************/

-- Selecteer de juiste database voor je stored procedure
use `jamin_a`;

-- Verwijder de oude stored procedure
DROP PROCEDURE IF EXISTS spGetAllMagazijnProduct;

-- Verander even tijdelijk de opdrachtprompt naar //
DELIMITER //

CREATE PROCEDURE spGetAllMagazijnProduct
(
       IN   pLimit    TINYINT    UNSIGNED
      ,IN   pOffset   SMALLINT   UNSIGNED
)
BEGIN
    
    SELECT   PROD.Id                    AS ProductId
            ,PROD.Naam
            ,PROD.Barcode
            ,MAGA.Id                    AS MagazijnId
            ,MAGA.ProductId             AS MagazijnProductId 
            ,MAGA.VerpakkingsEenheid
            ,MAGA.AantalAanwezig

    FROM    Product AS PROD

    INNER JOIN  Magazijn AS MAGA
            ON  PROD.Id = MAGA.ProductId
    
    ORDER BY PROD.Barcode ASC

    LIMIT pLimit OFFSET pOffset;
    

END //
DELIMITER ;

/************* debug code stored procedure **************

CALL spGetAllMagazijnProduct();

********************************************************/



