<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::table('professionals_org', function (Blueprint $table) {
        //     //
        // });
             DB::statement("ALTER TABLE professionals
    ADD CONSTRAINT fk_profession
    FOREIGN KEY (`profession`)
    REFERENCES `professionlists`(`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('professionals_org', function (Blueprint $table) {
            //
        });
    }
};
