<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UITest extends TestCase
{
    public function testUI()
    {
        $this->visit('/')->click(trans('login.login'))->seePageIs('/login');
        $this->visit('/')->click(trans('login.register'))->seePageIs('/register');
        $this->visit('/')->seePageIs('/');
    }
}
