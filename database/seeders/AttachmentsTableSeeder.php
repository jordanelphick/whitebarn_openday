<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttachmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attachments')->insert([
            'attachable_id' => '1',
            'attachable_type' => 'App\Models\Message',
            'filename' => 'test.jpeg',
            'filepath' => ''
        ]);
        DB::table('attachments')->insert([
            'attachable_id' => '1',
            'attachable_type' => 'App\Models\Message',
            'filename' => 'test.png',
            'filepath' => ''
        ]);
        DB::table('attachments')->insert([
            'attachable_id' => '1',
            'attachable_type' => 'App\Models\Message',
            'filename' => 'test.xlsx',
            'filepath' => ''
        ]);
        DB::table('attachments')->insert([
            'attachable_id' => '1',
            'attachable_type' => 'App\Models\Message',
            'filename' => 'test.docx',
            'filepath' => ''
        ]);
    }
}
