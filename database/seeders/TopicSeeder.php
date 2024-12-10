<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topic::create([
            'topic' => 'Net Id Terblokir',
            'slug' => 'net-id-terblokir',
        ]);
        Topic::create([
            'topic' => 'Device Terinfeksi Virus',
            'slug' => 'device-terinfeksi-virus',
        ]);
        Topic::create([
            'topic' => 'Lupa Password',
            'slug' => 'lupa-password',
        ]);
        Topic::create([
            'topic' => 'Key Email Terpakai Orang Lain',
            'slug' => 'key-email-terpakai-orang-lain',
        ]);
        Topic::create([
            'topic' => 'Lainnya',
            'slug' => 'lainnya',
        ]);
    }
}
