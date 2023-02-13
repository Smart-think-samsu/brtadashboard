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
        Schema::create('epassports', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('insurance_id')->nullable();
            $table->string('rpo_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('post_code')->nullable();
            $table->string('barcode')->nullable();
            $table->string('item_id')->nullable();
            $table->string('total_charge')->nullable();
            $table->string('service_type')->nullable();
            $table->string('vas_type')->nullable();
            $table->string('price')->nullable();
            $table->string('insured')->nullable();
            $table->string('booking_status')->nullable();
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
        Schema::dropIfExists('epassports');
    }
};
