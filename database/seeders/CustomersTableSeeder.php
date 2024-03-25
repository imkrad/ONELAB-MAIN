<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customers')->delete();
        
        \DB::table('customers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'R900001',
                'email' => 'cocacolazmbg@gmail.com',
                'name' => 'Zamboanga Plant',
                'contact_no' => '09123456789',
                'is_main' => 0,
                'is_active' => 1,
                'bussiness_id' => 38,
                'industry_id' => 54,
                'classification_id' => 74,
                'name_id' => 1,
                'laboratory_id' => 14,
                'user_id' => NULL,
                'created_at' => '2024-03-05 13:56:11',
                'updated_at' => '2024-03-05 13:56:11',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'R900002',
                'email' => 'cocacolapagads@gmail.com',
                'name' => 'Pagadian Distribution Center',
                'contact_no' => '09123654789',
                'is_main' => 0,
                'is_active' => 1,
                'bussiness_id' => 38,
                'industry_id' => 55,
                'classification_id' => 74,
                'name_id' => 1,
                'laboratory_id' => 14,
                'user_id' => NULL,
                'created_at' => '2024-03-05 13:57:59',
                'updated_at' => '2024-03-05 13:57:59',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'R900003',
                'email' => 'zampen@yahoo.com',
                'name' => 'Main',
                'contact_no' => '0123654789',
                'is_main' => 1,
                'is_active' => 1,
                'bussiness_id' => 51,
                'industry_id' => 57,
                'classification_id' => 74,
                'name_id' => 2,
                'laboratory_id' => 14,
                'user_id' => NULL,
                'created_at' => '2024-03-05 14:11:45',
                'updated_at' => '2024-03-05 14:11:45',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'R900004',
                'email' => 'zkc@yahoo.com',
                'name' => 'Main',
                'contact_no' => '09123654789',
                'is_main' => 1,
                'is_active' => 1,
                'bussiness_id' => 38,
                'industry_id' => 55,
                'classification_id' => 74,
                'name_id' => 3,
                'laboratory_id' => 14,
                'user_id' => NULL,
                'created_at' => '2024-03-05 14:50:19',
                'updated_at' => '2024-03-05 14:50:19',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'R900005',
                'email' => 'zcvfc@yahoo.com',
                'name' => 'Main',
                'contact_no' => '09123654999',
                'is_main' => 1,
                'is_active' => 1,
                'bussiness_id' => 38,
                'industry_id' => 54,
                'classification_id' => 74,
                'name_id' => 4,
                'laboratory_id' => 14,
                'user_id' => NULL,
                'created_at' => '2024-03-05 14:53:28',
                'updated_at' => '2024-03-05 14:53:28',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 'R900006',
                'email' => 'pepsi@yahoo.com',
                'name' => 'Main',
                'contact_no' => '09123654789',
                'is_main' => 1,
                'is_active' => 1,
                'bussiness_id' => 38,
                'industry_id' => 55,
                'classification_id' => 74,
                'name_id' => 5,
                'laboratory_id' => 14,
                'user_id' => NULL,
                'created_at' => '2024-03-05 14:56:00',
                'updated_at' => '2024-03-05 14:56:00',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 'R900007',
                'email' => 'zfc@yahoo.com',
                'name' => 'Main',
                'contact_no' => '09123654654',
                'is_main' => 1,
                'is_active' => 1,
                'bussiness_id' => 39,
                'industry_id' => 54,
                'classification_id' => 74,
                'name_id' => 6,
                'laboratory_id' => 14,
                'user_id' => NULL,
                'created_at' => '2024-03-05 14:58:26',
                'updated_at' => '2024-03-05 14:58:26',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => 'R900008',
                'email' => 'wmmc@yahoo.com',
                'name' => 'Main',
                'contact_no' => '09123654789',
                'is_main' => 1,
                'is_active' => 1,
                'bussiness_id' => 38,
                'industry_id' => 56,
                'classification_id' => 74,
                'name_id' => 7,
                'laboratory_id' => 14,
                'user_id' => NULL,
                'created_at' => '2024-03-05 15:00:51',
                'updated_at' => '2024-03-05 15:00:51',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => 'R900009',
                'email' => 'mosc@yahoo.com',
                'name' => 'Mampang',
                'contact_no' => '09123654789',
                'is_main' => 0,
                'is_active' => 1,
                'bussiness_id' => 39,
                'industry_id' => 56,
                'classification_id' => 74,
                'name_id' => 8,
                'laboratory_id' => 14,
                'user_id' => NULL,
                'created_at' => '2024-03-05 15:04:03',
                'updated_at' => '2024-03-05 15:04:03',
            ),
        ));
        
        
    }
}