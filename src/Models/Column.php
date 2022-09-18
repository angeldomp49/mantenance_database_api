<?php

namespace MakechTec\XochiDigital\Mantenance\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use MakechTec\XochiDigital\Mantenance\Column\ColumnCreator;
use \stdClass;

class Column extends Model{

    use HasFactory;

    protected $table = 'columns';

    protected $fillable = [
        "name",
        "type",
        "size",
        "table_id"
    ];

    public function table(){
        return $this->belongsTo(Table::class);
    }

    public function createInSchema(){
        $columnCreator = new ColumnCreator();
        $columnCreator->create($this);
    }

    public static function fromStdClass(stdClass $obj){
        $column = new Column();

        $column->name = $obj->name;
        $column->type = $obj->type;
        $column->size = $obj->size;

        return $column;
    }

    public static function createColumn(stdClass $dto){

        $column = Column::create([
            "name" => $dto->name,
            "type" => $dto->type,
            "size" => $dto->size,
            "table_id" => $dto->table_id
        ]);

        $column->createInSchema();

        return $column;

    }
}
