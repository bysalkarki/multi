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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->longText('logo')->nullable();
            $table->longText('flag')->nullable();
            $table->longText('address')->nullable();
            $table->longText('name');
            $table->string('email');
            $table->string('domain');
            $table->string('global_id');
            $table->integer('business_type')->default(1)->nullable();
            $table->longText('phone')->nullable();
            $table->longText('alt_phone')->nullable();
            $table->string('password');
            $table->timestamps();

            $table->index('global_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
