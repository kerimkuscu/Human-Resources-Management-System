<?php

use App\Models\Employee;
use App\Models\UserLeaveType;
use Illuminate\Database\Seeder;

class UserLeaveTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(UserLeaveType::class, 20)->create();
    }
}
