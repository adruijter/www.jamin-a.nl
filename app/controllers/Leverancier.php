<?php

class Leverancier extends BaseController
{
    private $leverancierModel;
    
    public function __construct()
    {
        $this->leverancierModel = $this->model('LeverancierModel');
    }

    public function index($pageNumber = 1, $limit = LIMIT)
    {
        $data = [
            'title' => 'Overzicht Leveranciers'
        ];

        $result = $this->leverancierModel->getAllLeveranciersWithProducts($pageNumber, $limit);
        // var_dump($result);


        $data['dataRows'] = $result;
        $data['pagination'] = new Pagination($result[0]->TotalRows, $limit, $pageNumber, __CLASS__, __FUNCTION__);


        $this->view('leverancier/index', $data);
    }

    public function geleverdeProducten($leverancierId, $pageNumber = 1, $limit = LIMIT)
    {
        $data = [
            'title' => 'Geleverde Producten'
        ];

        $result = $this->leverancierModel->getGeleverdeProducten($leverancierId, $pageNumber, $limit);

        $data['dataRows'] = $result;

        $this->view('leverancier/geleverdeProducten', $data);
    }
}