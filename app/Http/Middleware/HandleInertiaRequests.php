<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        if (Auth::check()) {
            $user = Auth::user()->loadMissing('professional');

            $authenticatedUser = [
                'name' => $user->name,
                'profile_image' => $user->profile_image ? Storage::url($user->profile_image) : Storage::url('profile_images/default.webp')
            ];

            if ($user->relationLoaded('professional')) {
                $authenticatedUser['professional'] = [
                    'title' => $user->professional->title
                ];
            }
        }

        return [...parent::share($request), 'authenticatedUser' => $authenticatedUser ?? null];
    }
}
