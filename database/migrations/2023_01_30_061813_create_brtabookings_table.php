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
        Schema::create('brtabookings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('drivingLicenseNo')->nullable();
            $table->string('brtaReferenceNo')->nullable();
            $table->string('name')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('mobileNo')->nullable();
            $table->string('houseOrVillage')->nullable();
            $table->string('road')->nullable();
            $table->string('postCode')->nullable();
            $table->string('thana')->nullable();
            $table->string('district')->nullable();
            $table->string('division')->nullable();
            $table->string('barcode')->nullable();
            $table->string('item_id')->nullable();
            $table->string('total_charge')->nullable();
            $table->string('service_type')->nullable();
            $table->string('vas_type')->nullable();
            $table->string('price')->nullable();
            $table->string('insured')->nullable();
            $table->boolean('booking_status')->nullable();
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
        Schema::dropIfExists('brtabookings');
    }
};
