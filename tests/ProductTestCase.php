<?php

namespace Tests;

abstract class  ProductTestCase extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->seed('Database\\Seeders\\ProductSeeder');
    }
}
