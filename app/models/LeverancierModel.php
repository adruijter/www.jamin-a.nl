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

    public function getAllLeveranciersWithProducts($pageNumber, $limit)
    {
        try {
            $sql = "CALL spGetAllLeveranciersWithProducts(:pageNumber, :limit);";

            $this->db->query($sql);

            $this->db->bind(':pageNumber', $pageNumber, PDO::PARAM_INT);
            $this->db->bind(':limit', $limit, PDO::PARAM_INT);

            return $this->db->resultSet();
        } catch (Exception $e) {
            // Behandel de uitzondering hier, bijvoorbeeld loggen of een foutmelding weergeven
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
        }
    }

    public function getGeleverdeProducten($leverancierId, $pageNumber, $limit)
    {
        try {
            $sql = "CALL spGetAllProductsFromLeverancier(:leverancierId, :pageNumber, :limit);";

            $this->db->query($sql);

            $this->db->bind(':leverancierId', $leverancierId, PDO::PARAM_INT);
            $this->db->bind(':pageNumber', $pageNumber, PDO::PARAM_INT);
            $this->db->bind(':limit', $limit, PDO::PARAM_INT);

            return $this->db->resultSet();
        } catch (Exception $e) {
            // Behandel de uitzondering hier, bijvoorbeeld loggen of een foutmelding weergeven
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
        }
    }
}