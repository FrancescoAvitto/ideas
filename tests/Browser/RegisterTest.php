<?php

use Illuminate\Support\Facades\Auth;

it('registeres a user', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'john@example.com')
        ->fill('password', 'password123!')
        ->click('Create Account')
        ->assertPathIs('/');

    $this->assertAuthenticated();
    
    expect(Auth::user())->toMatchArray([
        'name' => 'John Doe',
        'email' => 'john@example.com'
    ]);
});

it('requires a valid email address', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'john@com')
        ->fill('password', 'password123!')
        // ->debug();
        ->click('Create Account')
        ->assertPathIs('/register');
});
