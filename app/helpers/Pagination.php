<?php

class Pagination
{
    public $limit;
    public $offset;
    public $totalRows;
    public $totalPagenumbers;
    public $previousPage;
    public $currentPage;
    public $nextPage;
    public $paginationView;

    public function __construct($totalRows, $limit, $offset)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        $this->totalRows = $totalRows;
        $this->totalPagenumbers = $this->totalPagenumbers();
        $this->currentPage = $this->currentPage();
        $this->previousPage = $this->previousPage();
        $this->nextPage = $this->nextPage();
        $this->paginationView = $this->paginationView();
    }

    public function totalPagenumbers()
    {
        return ceil($this->totalRows / $this->limit);
    }

    public function currentPage()
    {
        return ($this->offset / $this->limit) + 1;

    }

    public function previousPage()
    {
        if ($this->offset - $this->limit < 0) {
            return 0;
        } else {
            return $this->offset - $this->limit;
        }
    }  
    
    public function nextPage()
    {
        // if ($this->offset + $this->limit > ) {
        //     return 0;
        // } else {
        //     return $this->offset + $this->limit;
        // }
    }

    public function paginationView1()
    {
        $paginationView = '';
        if ($this->totalPagenumbers > 1) {
            $paginationView .= '<ul class="pagination">';
            if ($this->currentPage > 1) {
                $paginationView .= '<li><a href="?offset=' . ($this->currentPage - 2) * $this->limit . '">Previous</a></li>';
            }
            for ($i = 1; $i <= $this->totalPagenumbers; $i++) {
                if ($i == $this->currentPage) {
                    $paginationView .= '<li class="active"><a href="?offset=' . ($i - 1) * $this->limit . '">' . $i . '</a></li>';
                } else {
                    $paginationView .= '<li><a href="?offset=' . ($i - 1) * $this->limit . '">' . $i . '</a></li>';
                }
            }
            if ($this->currentPage < $this->totalPagenumbers) {
                $paginationView .= '<li><a href="?offset=' . ($this->currentPage) * $this->limit . '">Next</a></li>';
            }
            $paginationView .= '</ul>';
        }
        return $paginationView;
    }

    public function paginationView()
    {
        $paginationView  = '<nav aria-label="Page navigation example">';
        $paginationView .= '<ul class="pagination pagination-sm justify-content-end">';
        $paginationView .= '<li class="page-item"><a class="page-link" href="' . URLROOT . '/magazijn/index/' . $this->limit . '/' . $this->previousPage . '">Previous</a></li>';

        for ($i = 1; $i <= $this->totalPagenumbers; $i++) {
            $paginationView .= '<li class="page-' . $i . '"><a class="page-link" href="' . URLROOT . '/magazijn/index/' . $this->limit . '/' . ($this->limit * ($i-1)) . '">' . $i .'</a></li>';
        }

        $paginationView .= '<li class="page-item"><a class="page-link" href="' . URLROOT . '/magazijn/index/' . $this->limit . '/' . $this->nextPage . '">Next</a></li>';
        $paginationView .= '</ul>';
        $paginationView .= '</nav>';
        return $paginationView;  
    }   
}
