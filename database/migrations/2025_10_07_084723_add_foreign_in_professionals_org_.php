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
        // Schema::table('professionals_org_', function (Blueprint $table) {
        //     //
        // });
        DB::statement('ALTER table professionals add column companyname varchar(40) after address');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('professionals_org_', function (Blueprint $table) {
            //
        });
    }
};
