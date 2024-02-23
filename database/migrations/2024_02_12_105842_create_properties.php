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
            $table->id(); // 主キー、自動インクリメント
            $table->integer('property_id')->unique(); // 一意の識別子
            $table->string('property_name');
            $table->unsignedBigInteger('responsible_id');
            $table->foreign('responsible_id')->references('id')->on('users'); // 外部キー制約
            $table->string('responsible_name');
            $table->string('accounting_person_name');
            $table->timestamps(); // 作成日時と更新日時
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};