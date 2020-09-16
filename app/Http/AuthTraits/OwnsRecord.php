<?php

namespace App\Http\AuthTraits;

use Illuminate\Support\Facades\Auth;

trait OwnsRecord
{
    public function userNotOwnerOf($modelRecord)
    {
        return $modelRecord->user != Auth::id();
    }

    public function currentUserOwns($modelRecord)
    {
        return $modelRecord->user === Auth::id();
    }

    public function adminOrCurrentUserOwns($modelRecord)
    {
        if (Auth::user()->level == 'admin') {
            return true;
        }
        return $modelRecord->user === Auth::id();
    }
}
