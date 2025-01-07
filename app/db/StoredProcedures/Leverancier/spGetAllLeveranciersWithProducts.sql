/**********************************************************
-- Doel: Opvragen van alle verschillende producten van alle
         toeleverende bedrijven met het aantal producten
-- Versie: 01
-- Datum:  13-12-2024
-- Auteur: Arjan de Ruijter
***********************************************************/

-- Selecteer de juiste database voor je stored procedure
use `jamin_a`;

-- Verwijder de oude stored procedure
DROP PROCEDURE IF EXISTS spGetAllLeveranciersWithProducts;

-- Verander even tijdelijk de opdrachtprompt naar //
DELIMITER //

CREATE PROCEDURE spGetAllLeveranciersWithProducts
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
    
    SELECT       LEVE.Id
                ,LEVE.Naam
                ,LEVE.Contactpersoon
                ,LEVE.LeverancierNummer
                ,LEVE.Mobiel
                ,COUNT(DISTINCT PPLE.ProductId) AS AantalProducten
                ,COUNT(*) OVER()                AS TotalRows

    FROM        Leverancier AS LEVE

    LEFT JOIN   ProductPerLeverancier AS  PPLE 

    ON          LEVE.Id = PPLE.LeverancierId

    GROUP BY    LEVE.Id

    ORDER BY    AantalProducten DESC

    LIMIT       pLimit OFFSET pOffset;
    

END //
DELIMITER ;

/************* debug code stored procedure **************

CALL spGetAllLeveranciersWithProducts();

********************************************************/



