<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnsTable extends Migration{

    public function up(){

        Schema::create('columns', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId("table_id")
                ->constrained()
                ->onUpdate("cascade")
                ->onDelete("cascade");

            $table->string("type");
            $table->integer("size");
            $table->timestamps();
        });
    }


    public function down(){

        Schema::dropIfExists('columns');
    }
}
