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
DROP PROCEDURE IF EXISTS spGetAllMagazijnProductPageNumberLimit;

-- Verander even tijdelijk de opdrachtprompt naar //
DELIMITER //

CREATE PROCEDURE spGetAllMagazijnProductPageNumberLimit
(
          IN pageNumber                SMALLINT      UNSIGNED
         ,IN maxRecordsPerPageNumber   TINYINT       UNSIGNED
)
BEGIN

    DECLARE pLimit              TINYINT       UNSIGNED;
    DECLARE pOffset             SMALLINT      UNSIGNED;
    DECLARE totaalAantalRijen   SMALLINT      UNSIGNED;
    
    SET     pLimit = maxRecordsPerPageNumber;
    
    IF pageNumber < 1 THEN
        SET pOffset = 0;
    ELSE
        SET pOffset = (pageNumber - 1) * maxRecordsPerPageNumber;
    END IF; 
    -- IF pageNumber > CEIL(totalRows/maxRecordsPerPageNumber) THEN
    --     SET pOffset = (CEIL(totalRows/maxRecordsPerPageNumber) - 1) * maxRecordsPerPageNumber;
    -- ELSE 
    --     SET pOffset = (pageNumber - 1) * maxRecordsPerPageNumber;
    -- END IF;
    
    
    SELECT   PROD.Id                    AS ProductId
            ,PROD.Naam
            ,PROD.Barcode
            ,MAGA.Id                    AS MagazijnId
            ,MAGA.ProductId             AS MagazijnProductId 
            ,MAGA.VerpakkingsEenheid
            ,MAGA.AantalAanwezig
            ,COUNT(*) OVER()            AS TotalRows

    FROM    Product AS PROD

    INNER JOIN  Magazijn AS MAGA
            ON  PROD.Id = MAGA.ProductId
    
    ORDER BY PROD.Barcode ASC

    LIMIT pLimit OFFSET pOffset;

END //
DELIMITER ;

/************* debug code stored procedure **************

CALL spGetAllMagazijnProductPageNumberLimit(1,5);

********************************************************/



