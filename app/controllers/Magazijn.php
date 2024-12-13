<?php

class Magazijn extends BaseController
{
    private $magazijnModel;

    public function __construct()
    {
        $this->magazijnModel = $this->model('MagazijnModel');
    }

    public function index($pageNumber = 1, $limit = LIMIT)
    {
        $data = [
            'title' => 'Overzicht Magazijn Jamin',
            'dataRows' => NULL, 
            'message' => NULL,
            'messageColor' => NULL,
            'messageVisibility' => 'display: none;',
            'pagination' => NULL
        ];
    
        $result = $this->magazijnModel->getAllMagazijnProduct($pageNumber, $limit);
        //  var_dump($result);

        if (is_null($result)) {
            $data['message'] = 'Er is zijn geen producten gevonden in het magazijn';
            $data['messageColor'] = 'danger';
            $data['messageVisibility'] = 'display: flex;';
        } elseif (empty($result)) {
            header('Refresh:4; url=' . URLROOT . '/magazijn/index/1');
        } else {
            $data['dataRows'] = $result;
            $data['pagination'] = new Pagination($result[0]->TotalRows, $limit, $pageNumber, __CLASS__, __FUNCTION__);
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

    public function getProductPerAllergeenById($productId)
    {
        $data = [
            'title' => 'Overzicht Allergenen',
            'dataRows' => NULL, 
            'message' => NULL,
            'messageColor' => NULL,
            'messageVisibility' => 'display: none;'
        ];

        $result = $this->magazijnModel->getProductPerAllergeenById($productId);

        if (is_null($result)) {
            $data['message'] = 'Er zijn geen Allergenen bekend van dit product';
            $data['messageColor'] = 'danger';
            $data['messageVisibility'] = 'display: flex;';
        } else {
            $data['dataRows'] = $result;
        }

        $this->view('magazijn/getProductPerAllergeenById', $data);
    }



}