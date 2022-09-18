<?php

namespace MakechTec\XochiDigital\Mantenance\Column;

use MakechTec\XochiDigital\Mantenance\Models\Column;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class StringStrategy implements ColumnStrategy{

    public function makeColumn(Column $column){
        Schema::transaction(function() use($column){
            
            Schema::table($column->table->name, function(Blueprint $table) use($column){
                $table->string($column->name, intval($column->size));
            });
        });
    }

}