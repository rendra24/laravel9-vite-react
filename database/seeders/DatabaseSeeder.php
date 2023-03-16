<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Aset;
use App\Models\Surat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('surat')->truncate();
        $surat = [];

            $surat[] =
            [
                'nama' => 'Surat Kehilangan',
                'keterangan' => '-',
                'status' => 1,
            ];

            $surat[] =
            [
                'nama' => 'Surat Kelahiran',
                'keterangan' => '-',
                'status' => 1,
            ];
            $surat[] =
            [
                'nama' => 'Surat Kematian',
                'keterangan' => '-',
                'status' => 1,
            ];
            $surat[] =
            [
                'nama' => 'Surat Keterangan Domisili',
                'keterangan' => '-',
                'status' => 1,
            ];
            $surat[] =
            [
                'nama' => 'Surat Keterangan Janda',
                'keterangan' => '-',
                'status' => 1,
            ];
            $surat[] =
            [
                'nama' => 'Surat Keterangan Penduduk',
                'keterangan' => '-',
                'status' => 1,
            ];
            $surat[] =
            [
                'nama' => 'Surat Keterangan Belum Pernah Mengurus KTP',
                'keterangan' => '-',
                'status' => 1,
            ];
            $surat[] =
            [
                'nama' => 'Surat Keterangan Belum Pernah Pindah',
                'keterangan' => '-',
                'status' => 1,
            ];
            $surat[] =
            [
                'nama' => 'Surat Keterangan Tidak Mampu',
                'keterangan' => '-',
                'status' => 1,
            ];
            $surat[] =
            [
                'nama' => 'Surat Keterangan Usaha',
                'keterangan' => '-',
                'status' => 1,
            ];


        foreach($surat as $row){
            Surat::create($row);
        }


        //Input default data aset
        Aset::truncate();

        $aset = [];

        $aset[] = ['nama' => 'Aset Tabung Gas'];
        $aset[] = ['nama' => 'Aset Kulkas '];
        $aset[] = ['nama' => 'Aset AC'];
        $aset[] = ['nama' => 'Aset Pemanas Air'];
        $aset[] = ['nama' => 'Aset Telepon Rumah'];
        $aset[] = ['nama' => 'Aset Televisi'];
        $aset[] = ['nama' => 'Aset Perhiasan'];
        $aset[] = ['nama' => 'Aset Komputer'];
        $aset[] = ['nama' => 'Aset Sepeda'];
        $aset[] = ['nama' => 'Aset Sepeda Motor'];
        $aset[] = ['nama' => 'Aset Mobil'];
        $aset[] = ['nama' => 'Aset Perahu'];
        $aset[] = ['nama' => 'Aset Motor Tempel'];
        $aset[] = ['nama' => 'Aset Perahu Motor'];
        $aset[] = ['nama' => 'Aset Kapal'];
        $aset[] = ['nama' => 'Aset Lahan'];
        $aset[] = ['nama' => 'Aset Rumah Lain'];

        foreach($aset as $row){
            Aset::create($row);
        }
    }
}