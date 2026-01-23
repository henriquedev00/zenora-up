<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Response as InertiaResponse;

class ProfileController extends Controller
{
    public function index(): InertiaResponse
    {
        $user = Auth::user()->loadMissing('professional');

        $userData = [
            'email' => $user->email,
            'full_name' => $user->full_name,
            'profile_image' => $user->profile_image ? Storage::url($user->profile_image) : Storage::url('profile_images/default.webp')
        ];

        if ($user->relationLoaded('professional')) {
            $userData['professional'] = [
                'title' => $user->professional->title,
                'professional_license' => $user->professional->professional_license
            ];
        }

        return Inertia::render('Profile', ['userData' => $userData]);
    }
}
