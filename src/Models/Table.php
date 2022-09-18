<?php

namespace MakechTec\XochiDigital\Mantenance\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \stdClass;

class Table extends Model{

    use HasFactory, SoftDeletes;

    protected $table = "tables";

    protected $fillable = [
        "name"
    ];

    public function columns(){
        return $this->hasMany(Column::class);
    }

    public function addColumn(Column $column){
        $column->table()
            ->associate($this);

        $column->save();

        Schema::transaction(function() use($column){

            $type = $column->type;
            $name = $column->name;
            $size = $column->size;
            
            Schema::table($this->name, function(Blueprint $table) use ($type, $name, $size){
                $table->$type($name, $size);
            });
        });

    }

    public function addColumnFromStdObject(stdClass $stardardObject){

        $column = Column::fromStdClass($stardardObject);

        $this->addColumn($column);

    }

}
