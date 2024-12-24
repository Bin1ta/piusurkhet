<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('application_files', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file');
            $table->foreignId('proposal_form_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('application_list_id')->nullable()->constrained()->nullOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('application_files');
    }
};
