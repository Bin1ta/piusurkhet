<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('office_settings', function (Blueprint $table) {
            $table->foreignId('fiscal_year_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('application_list')->default(false);
        });
    }

    public function down()
    {
        Schema::table('office_settings', function (Blueprint $table) {
            $table->foreignId('fiscal_year_id');
            $table->boolean('application_list');
        });
    }
};
