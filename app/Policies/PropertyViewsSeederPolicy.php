<?php

namespace App\Policies;

use App\Models\Property\PropertyViewsSeeder;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PropertyViewsSeederPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PropertyViewsSeeder $propertyViewsSeeder): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PropertyViewsSeeder $propertyViewsSeeder): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PropertyViewsSeeder $propertyViewsSeeder): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PropertyViewsSeeder $propertyViewsSeeder): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PropertyViewsSeeder $propertyViewsSeeder): bool
    {
        return false;
    }
}
