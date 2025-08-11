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
        Schema::create('data_sensers', function (Blueprint $table) {
            $table->id();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->string('sw1')->nullable()->default('الباب الرئيسي');
            $table->string('sw2')->nullable()->default('باب السطح العلوي');
            $table->string('sw3')->nullable()->default('باب المطبخ');
            $table->string('sw4')->nullable()->default('باب الصالة');
            $table->string('sw5')->nullable()->default('سوتش مساعد');
            $table->string('ir1')->nullable()->default(' الصاله');
            $table->string('ir2')->nullable()->default(' غرفة النوم');
            $table->string('ir3')->nullable()->default(' صالة الدخول ');
            $table->string('ir4')->nullable()->default(' الطيرمانه');
            $table->string('ir5')->nullable()->default(' مساعد');
            $table->string('fire1')->nullable()->default(' المطبخ');
            $table->string('fire2')->nullable()->default(' صالة الطعام');
            $table->string('fire3')->nullable()->default(' صالة الدخول');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sensers');
    }
};
