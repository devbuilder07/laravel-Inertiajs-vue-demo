<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PublicController extends Controller
{
    public function index()
    {
        $frameworks = [
            [
                'key' => 'Inertia v3',
                'value' => 'Client-side navigation without complex API architectures.'
            ],
            [
                'key' => 'Vue 3',
                'value' => 'Reactive components using Composition API and script setup.'
            ],
            [
                'key' => 'Tailwind CSS',
                'value' => 'Modern styling with utility classes and clean design tokens.'
            ]
        ];
        return Inertia::render(
            'frontend/index',
            [
                'frameworks' => $frameworks
            ]
        );
    }

    public function about()
    {
        return Inertia::render('frontend/about');
    }
}
