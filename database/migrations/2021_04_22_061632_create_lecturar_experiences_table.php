<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturarExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturar_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lecturer_id')->constrained()->cascadeOnDelete();
            $table->string('institute_name');
            $table->string('designation');
            $table->string('descrioption')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturar_experiences');
    }
}
