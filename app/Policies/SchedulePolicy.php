<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Schedules;

class SchedulePolicy
{
    /**
     * Determine if the given schedule can be updated by the user.
     */
    public function update(User $user, Schedules $schedule): bool
    {
        return $user->id === $schedule->user_id;
    }

    /**
     * Determine if the given schedule can be deleted by the user.
     */
    public function delete(User $user, Schedules $schedule): bool
    {
        return $user->id === $schedule->user_id;
    }
}
