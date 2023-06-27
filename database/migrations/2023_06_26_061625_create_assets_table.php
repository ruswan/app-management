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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->foreignId('asset_categori_id')->references('id')->on('asset_categories');
            $table->foreignId('brand_id')->references('id')->on('brands');
            $table->foreignId('condition_id')->references('id')->on('asset_conditions');
            $table->foreignId('department_id')->nullable()->references('id')->on('departments');
            $table->string('sn_number')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('code')->nullable();
            $table->string('location')->nullable();
            $table->date('purchase_year')->nullable();
            $table->string('attachment')->nullable();
            $table->foreignId('owner_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
