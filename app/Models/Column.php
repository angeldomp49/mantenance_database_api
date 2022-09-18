<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \stdClass;

class Column extends Model{

    use HasFactory;

    protected $table = 'columns';

    protected $fillable = [
        "name",
        "type",
        "size"
    ];

    public function table(){
        return $this->belongsTo(Table::class);
    }

    public static function fromStdClass(stdClass $obj){
        $column = new Column();

        $column->name = $obj->name;
        $column->type = $obj->type;
        $column->size = $obj->size;

        return $column;
    }
}
