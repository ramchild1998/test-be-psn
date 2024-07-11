<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('addresses')->truncate();
        \DB::table('customers')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
