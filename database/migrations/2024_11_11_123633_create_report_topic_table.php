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
        Schema::create('report_topic', function (Blueprint $table) {
            $table->uuid('report_id'); // UUID (CHAR(36))
            $table->unsignedBigInteger('topic_id'); 

            $table->primary(['report_id', 'topic_id']);

            $table->foreign('report_id')->references('id')->on('reports')->onDelete('restrict');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('restrict');        
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('report_topic');
    }
};
