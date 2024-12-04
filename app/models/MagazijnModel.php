<?php

class MagazijnModel
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
    
    
    public function getAllMagazijnProduct($limit, $offset)
    {
        try {
            
            $sql = "CALL spGetAllMagazijnProductLimitOffsetCTE(:limit, :offset)";

            $this->db->query($sql);

            $this->db->bind(':limit', $limit, PDO::PARAM_INT);
            $this->db->bind(':offset', $offset, PDO::PARAM_INT);

            return $this->db->resultSet();

        } catch (Exception $e) {
            // Behandel de uitzondering hier, bijvoorbeeld loggen of een foutmelding weergeven
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
        }
        
    }

    public function getProductLeveringById($productId)
    {
        try {
            $sql = "CALL spSelectProductLeveringById(:productId)";

            $this->db->query($sql);

            $this->db->bind(':productId', $productId, PDO::PARAM_INT);

            return $this->db->resultSet();
        } catch (Exception $e) {
            // Behandel de uitzondering hier, bijvoorbeeld loggen of een foutmelding weergeven
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
        }
    }

    function getProductPerAllergeenById($productId)
    {
        try {
            $sql = "CALL spSelectAllergeenPerProductById(:productId)";

            $this->db->query($sql);

            $this->db->bind(':productId', $productId, PDO::PARAM_INT);

            return $this->db->resultSet();
        } catch (Exception $e) {
            // Behandel de uitzondering hier, bijvoorbeeld loggen of een foutmelding weergeven
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
        }
    }
}