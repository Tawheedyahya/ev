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
        Schema::table('venues', function (Blueprint $table) {
            //
            $table->string('vedios')->nullable();
            $table->string('halal_doc')->nullable();
            $table->text('why');
            $table->text('what');
            // $table->enum('halal',[1,2])->default(2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('venues', function (Blueprint $table) {
            //
            $table->dropColumn('vedios');
            $table->dropColumn('halal_doc');
            $table->dropColumn('why');
            $table->dropColumn('what');
        });
    }
};
