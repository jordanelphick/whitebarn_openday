<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('messages')->insert([
            'body' => 'Zenviron has previously been provided EDOC-2372 Vestas WTG Transformer specifcation sheet during Early Works. Please confirm this is the proposed transformer to be used on the projceet.',
            'subject' => '',
            'rfi_id' => '1',
            'user_id' => '1',
            'visibility' => 'public',
            'created_at' =>'2023-05-25 13:00:00'
        ]);

        DB::table('messages')->insert([
            'body' => 'Please refer to the Design Inputs folder within teh Engineering - System Analysis for the latest files provided by Vestas',
            'subject' => '',
            'rfi_id' => '1',
            'user_id' => '2',
            'visibility' => 'internal',
            'created_at' =>'2023-05-26 13:00:00'
        ]);

        DB::table('messages')->insert([
            'body' => 'Should this file be transferred to the reliance table?',
            'subject' => '',
            'rfi_id' => '1',
            'user_id' => '1',
            'visibility' => 'internal',
            'created_at' =>'2023-05-26 17:30:00'

        ]);
        DB::table('messages')->insert([
            'body' => 'Yes',
            'subject' => '',
            'rfi_id' => '1',
            'user_id' => '4',
            'visibility' => 'internal',
            'created_at' =>'2023-05-27 13:00:00'
        ]);

        DB::table('messages')->insert([
            'body' => 'Tilt to transfer the chosen WTG tech spec for the Project in the  Contract Schedule reliance information?',
            'subject' => '',
            'rfi_id' => '1',
            'user_id' => '1',
            'visibility' => 'public',
            'created_at' =>'2023-05-30 13:00:00'
        ]);
    }
}
