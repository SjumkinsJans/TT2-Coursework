<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Comic;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
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
    public function view(User $user, Comment $comment): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Comment $comment, Comic $comic): bool
    {
        return ($user->id == $comment->user_id ||  ($user->isAuthor() && $comic->author_id === Auth::id()));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user,Comment $comment): bool
    {
        
        return ($user->id === $comment->user_id or 
        ($user->isAuthor() &&  Comic::where('id',$comment->comic_id)->value('author_id') === Auth::id() ));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Comment $comment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Comment $comment): bool
    {
        return false;
    }

    public function before(User $user, string $ability) {
        if($user->isAdmin()) {
            return true;
        } 
    }
}
