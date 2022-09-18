<?php
namespace MakechTec\XochiDigital\Mantenance;

use App\Models\Table;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TableFactory {

    public function createTable(String $name){

        DB::transaction(function() use($name){
            Schema::create($name, function(Blueprint $table){});
        });

        $createdTable = Table::create([
            "name" => $name
        ]);

        return $createdTable;
    }

    public function deleteTable(String $name){

        DB::transaction(function() use($name){
            Schema::dropIfExists($name);
        });

        $currentTable = Table::where("name = ?", $name)->first();

        foreach ($currentTable->columns as $column){
            $column->delete();
        }

        $currentTable->delete();
    }

}