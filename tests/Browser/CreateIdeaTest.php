<?php

use App\Models\User;

it('Creates a new idea', function (): void {
    $this->actingAs($user = User::factory()->create());

    visit('/ideas')
        ->click('@create-idea-button')
        ->fill('title', 'Some example title')
        ->click('@button-status-completed')
        ->fill('description', 'An example description')
        ->fill('@new-link', 'https://laracasts.com')
        ->click('@submit-new-link-button')
        ->fill('@new-link', 'https://laravel.com')
        ->click('@submit-new-link-button')
        ->click('@create-idea')
        ->assertPathIs('/ideas');

    expect($user->ideas())->toMatchArray([
        'title' => 'Some example title',
        'status' => 'completed',
        'description' => 'An example description',
        'links' => ['https://laracasts.com', 'https://laravel.com'],
    ]);
});
