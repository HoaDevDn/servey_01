<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    // public function testAdminLoginSuccess()
    // {
    //     $this->visit('/login')
    //         ->type('admin@gmail.com', 'email')
    //         ->type('123123', 'password')
    //         ->press(trans('login.login'))
    //         ->seePageIs('/admin/dashboard');
    // }

    public function testUserLoginSuccess()
    {
        $this->visit('/login')
            ->type('phuhoadn95@gmail.com', 'email')
            ->type('123123', 'password')
            ->press(trans('login.login'))
            ->seePageIs('/home');
    }

    public function testUserLoginFail()
    {
        $faker = Faker\Factory::create();
        $this->visit('/login')
            ->type($faker->email, 'email')
            ->type($faker->password, 'password')
            ->press(trans('login.login'))
            ->seePageIs('/login');
    }

    public function testLoginEgnoreEmailField()
    {
        $faker = Faker\Factory::create();
        $this->visit('/login')
            ->type('', 'email')
            ->type($faker->password, 'password')
            ->press(trans('login.login'))
            ->seePageIs('/login');
    }

    public function testLoginIgnorePasswordField()
    {
        $faker = Faker\Factory::create();
        $this->visit('/login')
            ->type($faker->email, 'email')
            ->type('', 'password')
            ->press(trans('login.login'))
            ->seePageIs('/login');
    }

    public function testLoginIncorrectField()
    {
        $faker = Faker\Factory::create();
        $this->visit('/login')
            ->type($faker->email, 'email')
            ->type($faker->password, 'password')
            ->press(trans('login.login'))
            ->seePageIs('/login');
    }

    public function testLoginInvalidEmail()
    {
        $this->visit('/login')
            ->type(str_random(10), 'email')
            ->type('', 'password')
            ->press(trans('login.login'))
            ->seePageIs('/login');
    }
}
