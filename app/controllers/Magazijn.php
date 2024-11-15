<?php

class Magazijn extends BaseController
{
    private $magazijnModel; 

    public function __construct()
    {
        $this->magazijnModel = $this->model('MagazijnModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Overzicht Magazijn Jamin',
            'dataRows' => NULL, 
            'message' => NULL,
            'messageColor' => NULL,
            'messageVisibility' => 'display: none;'
        ];


        $result = $this->magazijnModel->getAllMagazijnProduct();
        
        if (is_null($result)) {
            $data['message'] = 'Er is zijn geen producten gevonden in het magazijn';
            $data['messageColor'] = 'danger';
            $data['messageVisibility'] = 'display: flex;';
        } else {
            $data['dataRows'] = $result;
        }

        $this->view('magazijn/index', $data);
    }

    public function getProductLeveringById($productId) 
    {

        $data = [
            'title' => 'LeveringsInformatie',
            'dataRows' => NULL, 
            'message' => NULL,
            'messageColor' => NULL,
            'messageVisibility' => 'display: none;'
        ];

        $result = $this->magazijnModel->getProductLeveringById($productId);

        if (is_null($result)) {
            $data['message'] = 'Er zijn geen leveringen bekend van dit product';
            $data['messageColor'] = 'danger';
            $data['messageVisibility'] = 'display: flex;';
        } else {
            $data['dataRows'] = $result;
        }

        
        $this->view('magazijn/getProductLeveringById', $data);
        
    }

}