<?php

/**
 * Deze klasse is verantwoordelijk voor het pagineren van data
 */

class Pagination
{
    // Klassenvariabelen
    public $totalRows;
    public $limit;
    public $page;
    public $class;
    public $method;
    public $totalPages;
    public $offset;


    public function __construct($totalRows, $limit, $page, $class, $method)
    {
        $this->totalRows = $totalRows;
        $this->limit = $limit;
        $this->page = intval($page) ? (int) $page : 1 ;
        $this->class = $class;
        $this->method = $method;
        $this->totalPages = $this->totalPages();
        $this->offset = $this->currentPageOffset();
    }

    public function currentPageOffset()
    {
        return $this->page * $this->limit;
    }

    public function totalPages()
    {
        $this->totalPages = ceil($this->totalRows / $this->limit);
        return $this->totalPages;
    }

    public function previousPage()
    {
        if (($this->page - 1) < 1) {
            return $this->page = 1;
        } else {
            return ($this->page - 1);
        }
    }

    public function nextPage()
    {
        if (($this->page + 1) > $this->totalPages) {
            return $this->page = $this->totalPages;
        } else {
            return ($this->page + 1);
        }
    }


    public function paginationView()
    {
        $paginationView  = '<nav aria-label="Page navigation example">';
        $paginationView .= '<ul class="pagination pagination-sm justify-content-begin">';
        $paginationView .= '<li class="page-previous ';
        $paginationView .= ($this->page == 1) ? 'disabled' : '';
        $paginationView .= '"><a class="page-link" href="' . URLROOT . '/' . $this->class . '/' . $this->method . '/' . $this->previousPage() . '">previous</a></li>';
        for ($i = 1; $i <= $this->totalPages; $i++) {
            $paginationView .= '<li class="page-' . $i; 
            $paginationView .= ($i == $this->page) ? ' active' : '';
            $paginationView .= '"><a class="page-link" href="' . URLROOT . '/' . $this->class . '/' . $this->method . '/'  . $i . '">' . $i . '</a></li>';
        }
        $paginationView .= '<li class="page-next ';
        $paginationView .= ($this->page == $this->totalPages) ? 'disabled' : '';
        $paginationView .= '"><a class="page-link" href="' . URLROOT . '/' . $this->class . '/' . $this->method . '/' . $this->nextPage() . '">next</a></li>';
        $paginationView .= '</ul>';
        $paginationView .= '</nav>';

        return $paginationView;
    }

}

