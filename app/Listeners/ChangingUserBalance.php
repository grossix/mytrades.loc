<?php

namespace App\Listeners;

use App\Events\OperationWasPublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class ChangingUserBalance
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OperationWasPublished  $event
     * @return void
     */
    public function handle(OperationWasPublished $event)
    {
        $user = Auth::user();
        $addedMoney = $user->money += $event->profit;
        $user->money = $addedMoney;
        if(($addedMoney) >= 2.49) {
            $addKeys = floor($addedMoney / 2.49);

            $user->reports()->create([
                'keys' => $user->keys += $addKeys,
                'money' => $user->money -= 2.49 * $addKeys,
                'description' => ''
            ]);

        }

        $user->save();
    }
}
