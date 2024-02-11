<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id('id');
            $table->string('property_name');
            $table->unsignedBigInteger('responsible_id');
            $table->string('responsible_name');
            $table->string('accounting_person_name');
            $table->date('transfer_date');
            $table->timestamps();
            //フロント担当＝物件担当を外部キーに設定/ 
            $table->foreign('responsible_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
