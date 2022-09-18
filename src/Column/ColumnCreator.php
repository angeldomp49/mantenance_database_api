<?php

namespace MakechTec\XochiDigital\Mantenance\Column;

use MakechTec\XochiDigital\Mantenance\Models\Column;

class ColumnCreator{

    private $strategies = [];

    public function __construct(){
        $this->strategies = [
            "string" => new StringStrategy(),
        ];
    }

    public function create(Column $column){

        $strategy = $this->strategies[$column->type];

        $this->createColumn( $column, $strategy );
    }

    public function createColumn(Column $column, ColumnStrategy $strategy){
        $strategy->makeColumn($column);
    }

}