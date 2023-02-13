<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('role_id')->comment('id from role table');
            $table->string('menu_name',100)->nullable();
            $table->string('slug',100)->nullable();
            $table->tinyInteger('create')->comment('0=not permissible, 1=permissibl');
            $table->tinyInteger('view')->comment('0=not permissible, 1=permissibl');
            $table->tinyInteger('edit')->comment('0=not permissible, 1=permissibl');
            $table->tinyInteger('delete')->comment('0=not permissible, 1=permissibl');
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
        Schema::dropIfExists('role_permissions');
    }
};
