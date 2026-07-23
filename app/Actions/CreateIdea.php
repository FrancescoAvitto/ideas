<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Container\Attributes\CurrentUser;


class CreateIdea
{
    public function __construct(#[CurrentUser] protected User $user)
    {
        
    }


    public function handle(array $attributes)
    {

        $data = collect($attributes)->only([
            'title', 'description', 'status', 'links',
        ])->toArray();

        if ($attributes['image'] ?? false) {
            $data['image_path'] = $attributes['image']->store('ideas', 'public');

        }

        DB::transaction(function () use ($data, $attributes): void {
            $idea = $this->user->ideas()->create($data);

            $steps = collect($attributes['steps'] ?? [])->map(fn ($step) => ['description' => $step]);

            $idea->steps()->createMany($steps);

        });

    }
}
