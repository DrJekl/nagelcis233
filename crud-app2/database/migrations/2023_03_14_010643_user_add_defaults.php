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
        Schema::table("users", function (BluePrint $table) {
            $table->string("password")->default("password")->change();
            $table->string("role")->default("viewer")->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("users", function (BluePrint $table) {
            $table->string("password")->change();
            $table->string("role")->change();
        });
    }
};
