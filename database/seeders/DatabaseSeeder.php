<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
use App\Models\Province;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create(
            [
            'name' => 'user testing',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'user',
        ]);

        User::create(
            [
            'name' => 'admin testing',
            'email' =>  'admin@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'admin',
        ]);

        //Provinsi
        $csvFile = fopen(base_path("database/data/provinsi.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Province::create([
                    "provinsi" => $data['0']
                    
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);


        //Kota
        $csvFile = fopen(base_path("database/data/kota.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                City::create([
                    "id_provinsi" => $data['0'],
                    "kota" => $data['1']
                    
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
