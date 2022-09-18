<?php

namespace App\Http\Controllers;

use App\Http\Resources\Table as TableResource;
use App\Models\Table as TableModel;
use Illuminate\Http\Request;
use MakechTec\XochiDigital\Mantenance\TableFactory;

class TableController extends Controller{

    private TableFactory $tableFactory;

    public function __construct(TableFactory $tableFactory){
        $this->tableFactory = $tableFactory;
    }

    public function index(){
        return TableResource::collection(TableModel::all());
    }

    public function store(Request $request){
        
        $result = $this->tableFactory->createTable($request->table_name);
        return new TableResource($result);

    }

    public function show(TableModel $table){
        return new TableResource($table);
    }

    public function update(Request $request, TableModel $table){

        $dto = json_decode($request->data);

        foreach ($dto->columns as $columnData ) {
            $table->addColumnFromStdObject($columnData);
        }
        return new TableResource($table);
    }

    public function destroy(TableModel $table){
        $this->tableFactory->deleteTable($table->name);
        return response()->json(["status" => 200]);
    }
}
