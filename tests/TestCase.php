<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @return User|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getUser()
    {
        return User::first();
    }
}
