<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MultiLanguage extends TestCase
{
    public function testChoiseLanguageInHomePage()
    {
        $this->visit('/')
            ->select(config('settings.langguage.en'), 'lang')
            ->seePageIs('/home');
    }

    public function testChoiseLanguageInLoginPage()
    {
        $this->visit('/login')
            ->select(config('settings.langguage.vi'), 'lang')
            ->seePageIs('/login');
    }
}
