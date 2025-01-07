/**********************************************************
-- Doel: Opvragen van alle verschillende producten van een
         toeleverend bedrijf met alle verschillende producten
-- Versie: 01
-- Datum:  17-12-2024
-- Auteur: Arjan de Ruijter
***********************************************************/

-- Selecteer de juiste database voor je stored procedure
use `jamin_a`;

-- Verwijder de oude stored procedure
DROP PROCEDURE IF EXISTS spGetAllProductsFromLeverancier;

-- Verander even tijdelijk de opdrachtprompt naar //
DELIMITER //

CREATE PROCEDURE spGetAllProductsFromLeverancier
(
     IN leverancierId             TINYINT       UNSIGNED
    ,IN pageNumber                SMALLINT      UNSIGNED
    ,IN maxRecordsPerPageNumber   TINYINT       UNSIGNED
)
BEGIN
    DECLARE pLimit              TINYINT       UNSIGNED;
    DECLARE pOffset             SMALLINT      UNSIGNED;
    
    SET     pLimit = maxRecordsPerPageNumber;
    
    IF pageNumber < 1 THEN
        SET pOffset = 0;
    ELSE
        SET pOffset = (pageNumber - 1) * maxRecordsPerPageNumber;
    END IF; 
    
    SELECT       LEVE.Id
                ,LEVE.Naam                  AS LeverancierNaam
                ,LEVE.Contactpersoon
                ,LEVE.LeverancierNummer
                ,LEVE.Mobiel
                ,PROD.Naam                  AS ProductNaam	
                ,MAGA.AantalAanwezig        AS AantalInMagazijn
                ,MAGA.VerpakkingsEenheid
                ,PPLE.ProductId             AS ProductId
                ,MAX(PPLE.DatumLevering)    AS LaatsteLevering
                ,COUNT(*) OVER()            AS TotalRows

    FROM        Leverancier AS LEVE

    LEFT JOIN   ProductPerLeverancier AS  PPLE 

    ON          LEVE.Id = PPLE.LeverancierId

    LEFT JOIN   Product AS PROD
    ON          PPLE.ProductId = PROD.Id

    LEFT JOIN   Magazijn AS MAGA 
    ON          PROD.Id = MAGA.ProductId
    
    GROUP BY    ProductId

    HAVING      LEVE.Id = leverancierId

    ORDER BY    AantalInMagazijn DESC

    LIMIT       pLimit OFFSET pOffset;
    

END //
DELIMITER ;

-- ************* debug code stored procedure **************
   CALL spGetAllProductsFromLeverancier(1,1,2);
-- ********************************************************



