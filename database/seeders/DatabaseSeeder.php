<?php

namespace Database\Seeders;

use App\Models\Superadmin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $super_admins=new Superadmin();
        $super_admins->name='naga';
        $super_admins->email='nagaa@gmail.com';
        $super_admins->password=Hash::make('111111');
        $super_admins->save();
    }
}
