<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\loginUser;
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication,loginUser ;
}
