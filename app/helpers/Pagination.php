<?php

class Pagination
{
    private $limit;
    private $offset;
    private $totalRows;

    public function __construct($totalRows, $limit, $offset)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        $this->totalRows = $totalRows;
    }
   
}
