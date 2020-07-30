<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TipoCategoria;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipoCategoriaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TipoCategoria  $tipoCategoria
     * @return mixed
     */
    public function view(User $user, TipoCategoria $tipoCategoria)
    {
        return $user->id === $tipoCategoria->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TipoCategoria  $tipoCategoria
     * @return mixed
     */
    public function update(User $user, TipoCategoria $tipoCategoria)
    {
        return $user->id === $tipoCategoria->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TipoCategoria  $tipoCategoria
     * @return mixed
     */
    public function delete(User $user, TipoCategoria $tipoCategoria)
    {
        return $user->id === $tipoCategoria->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TipoCategoria  $tipoCategoria
     * @return mixed
     */
    public function restore(User $user, TipoCategoria $tipoCategoria)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TipoCategoria  $tipoCategoria
     * @return mixed
     */
    public function forceDelete(User $user, TipoCategoria $tipoCategoria)
    {
        return false;
    }


    // public function before($user, $ability)
    // {
    //     if ($user->isSuperAdmin()) {
    //         return true;
    //     }
    // }
}
