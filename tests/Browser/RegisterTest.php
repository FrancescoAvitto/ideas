<?php

use Illuminate\Support\Facades\Auth;

it('registeres a user', function (): void {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'john@example.com')
        ->fill('password', 'password123!')
        ->click('Create Account')
        ->assertPathIs('/ideas');

    $this->assertAuthenticated();

    expect(Auth::user())->toMatchArray([
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

it('requires a valid email address', function (): void {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'john@google.com')
        ->fill('password', 'password123!')
        // ->debug();
        ->click('Create Account')
        ->assertPathIs('/ideas');
});
