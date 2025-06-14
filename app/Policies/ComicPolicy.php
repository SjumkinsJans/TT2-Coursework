<?php

namespace App\Policies;

use App\Models\Comic;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ComicPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Comic $comic): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return ($user->isAuthor());
    }

    public function store(User $user): bool
    {
        return ($user->isAuthor());
    }

    public function edit(User $user, Comic $comic): bool
    {
        return ($user->isAuthor() && $comic->author_id === Auth::id());
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Comic $comic): bool
    {
        return ($user->isAuthor() && $comic->author_id === Auth::id());
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comic $comic): bool
    {
        return ($user->isAuthor() && $comic->author_id === Auth::id());
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Comic $comic): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Comic $comic): bool
    {
        return false;
    }

    public function before(User $user, string $ability) {
        if($user->isAdmin()) {
            return true;
        } 
    }
}
