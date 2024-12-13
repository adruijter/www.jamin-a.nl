<?php

class Leverancier extends BaseController
{
    private $leverancierModel;
    
    public function __construct()
    {
        $this->leverancierModel = $this->model('LeverancierModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Overzicht Leveranciers'
        ];

        $result = $this->leverancierModel->getAllLeveranciersWithProducts();
        // var_dump($result);
        $data['dataRows'] = $result;

        $this->view('leverancier/index', $data);
    }
}