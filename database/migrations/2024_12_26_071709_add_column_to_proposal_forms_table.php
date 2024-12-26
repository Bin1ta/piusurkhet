<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('proposal_forms', function (Blueprint $table) {
            $table->foreignId('document_id')->nullable()->constrained('documents')->nullOnDelete()->onUpdate('no action');
        });
    }

    public function down()
    {
        Schema::table('proposal_forms', function (Blueprint $table) {
            $table->foreignId('document_id');
        });
    }
};
