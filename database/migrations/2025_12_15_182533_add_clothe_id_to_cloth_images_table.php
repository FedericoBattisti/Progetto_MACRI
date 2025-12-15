<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cloth_images', function (Blueprint $table) {
            $table->unsignedBigInteger('clothe_id'); // o cloth_id
            // opzionale, se vuoi la FK vera:
            // $table->foreign('clothe_id')->references('id')->on('clothes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('cloth_images', function (Blueprint $table) {
            // se hai messo la FK, prima dropForeign, poi dropColumn
            // $table->dropForeign(['clothe_id']);
            $table->dropColumn('clothe_id');
        });
    }
};
