<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'supervisor@astra.com'],
            [
                'name' => 'Vincent Genesius',
                'password' => Hash::make('12345678'),
                'role' => 'supervisor',
            ]
        );

        User::updateOrCreate(
            ['email' => 'dealer@astra.com'],
            [
                'name' => 'Evan Dimitri',
                'password' => Hash::make('12345678'),
                'role' => 'dealer',
            ]
        );
    }
}
