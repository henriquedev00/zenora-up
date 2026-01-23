<?php

namespace App\Http\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdatePasswordAction
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'new_password' => ['required', 'confirmed']
        ]);

        $user = Auth::user();

        $user->update(['password' => $data['new_password']]);

        return back();
    }
}
