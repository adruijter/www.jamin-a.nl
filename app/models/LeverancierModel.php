<?php

class LeverancierModel
{
    private $db;

    public function __construct()
    {
        /**
         * Maak een nieuw database object die verbinding maakt met de 
         * MySQL server
         */
        $this->db = new Database();
    }

    public function getAllLeveranciersWithProducts()
    {
        try {
            $sql = "CALL spGetAllLeveranciersWithProducts();";

            $this->db->query($sql);

            return $this->db->resultSet();
        } catch (Exception $e) {
            // Behandel de uitzondering hier, bijvoorbeeld loggen of een foutmelding weergeven
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
        }
    }
}