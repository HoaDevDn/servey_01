<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    public function testUserRegisterSuccess()
    {
        $faker = Faker\Factory::create();
        $this->visit('/register')
            ->type($faker->email, 'email')
            ->type('123123', 'password')
            ->press(trans('login.register'));
    }

    public function testUserRegisterFail()
    {
        $faker = Faker\Factory::create();
        $this->visit('/register')
            ->type('', 'email')
            ->type('123123', 'password')
            ->press(trans('login.register'))
            ->seePageIs('/register');
    }

    public function testUserRegisterAccountExists()
    {
        $faker = Faker\Factory::create();
        $this->visit('/register')
            ->type('minhtri191195@gmail.com', 'email')
            ->type('123123', 'password')
            ->press(trans('login.register'))
            ->seePageIs('/register');
    }

    // public function testUserRegisterAccountExists()
    // {
    //     $faker = Faker\Factory::create();
    //     $this->visit('/register')
    //         ->type('minhtri191195@gmail.com', 'email')
    //         ->type('123123', 'password')
    //         ->press(trans('login.register'))
    //         ->seePageIs('/register');
    // }
}
