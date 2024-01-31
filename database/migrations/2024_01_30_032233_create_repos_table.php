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
        Schema::create('repos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('gh_repo_id');
            $table->string('name', 200);
            $table->string('url', 500);
            $table->string('description', 500)->nullable();
            $table->unsignedInteger('stars_num');
            $table->date('repo_created');
            $table->date('repo_last_pushed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repos');
    }
};
