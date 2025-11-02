<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Direction;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::firstOrCreate(
            ['email' => 'nelly@gmail.com'],
            [
                'name' => 'Nelly Komguep',
                'password' => Hash::make('Nelly1234'),
                'roles' => 'manager',
                'direction' => 'DISI',
                'matricule' => 'MM23I2203',
            ]
        );

        User::firstOrCreate(
            ['email' => 'abdel@gmail.com'],
            [
                'name' => 'Abdel Salim',
                'password' => Hash::make('abdel123'),
                'roles' => 'agent',
                'direction' => 'DASI',
                'matricule' => '23I2203',
            ]
        );

        User::firstOrCreate(
            ['email' => 'joyciekamgo64@gmail.com'],
            [
                'name' => 'Joycie kamgo',
                'password' => Hash::make('Joycie2007'),
                'roles' => 'manager',
                'direction' => 'DISI',
                'matricule' => 'MM23I2203',
            ]
        );

        User::firstOrCreate(
            ['email' => 'jomo@gmail.com'],
            [
                'name' => 'Jordy Kamgo',
                'password' => Hash::make('jomo1234'),
                'roles' => 'agent',
                'direction' => 'DASI',
                'matricule' => '23I2203',
            ]
        );
    }
}
