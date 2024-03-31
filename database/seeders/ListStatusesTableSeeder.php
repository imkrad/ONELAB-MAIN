<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListStatusesTableSeeder extends Seeder
{
    /**
     * Auto generated seeder file.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('list_statuses')->truncate();
        
        \DB::table('list_statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Pending',
                'type' => 'Request',
                'color' => 'bg-warning-subtle',
                'others' => 'text-warning',
                'is_active' => 1,
                'created_at' => '2024-03-28 10:33:01',
                'updated_at' => '2024-03-28 10:33:01',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Ongoing',
                'type' => 'Request',
                'color' => 'bg-info-subtle',
                'others' => 'text-info',
                'is_active' => 1,
                'created_at' => '2024-03-28 10:33:01',
                'updated_at' => '2024-03-28 10:33:01',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Completed',
                'type' => 'Request',
                'color' => 'bg-success-subtle',
                'others' => 'text-success',
                'is_active' => 1,
                'created_at' => '2024-03-28 10:33:01',
                'updated_at' => '2024-03-28 10:33:01',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Cancelled',
                'type' => 'Request',
                'color' => 'bg-danger-subtle',
                'others' => 'text-danger',
                'is_active' => 1,
                'created_at' => '2024-03-28 10:33:01',
                'updated_at' => '2024-03-28 10:33:01',
            ),
        ));

        
    }
}