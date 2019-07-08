<?php

use Illuminate\Database\Seeder;
use App\Tipesoal;

class TipeSoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Tipesoal::count() == 0){
            TipeSoal::create([
                'tipe'      => 'teks',
                'deskripsi' => 'Soal Teks'
            ]);

            TipeSoal::create([
                'tipe'      => 'suara',
                'deskripsi' => 'Soal Listening'
            ]);

            TipeSoal::create([
                'tipe'      => 'gambar',
                'deskripsi' => 'Soal Gambar'
            ]);
        }
    }
}
