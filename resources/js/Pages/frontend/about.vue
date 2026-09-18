<template>
    <main
        class="flex-1 flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 py-16 sm:py-24 relative overflow-hidden">

        <Head title="About - Laravel Vue Inertia">
            <meta name="description"
                content="Learn more about our Laravel, Vue 3, and Inertia.js application and its client-side state preservation."
                head-key="description" />
            <meta name="keywords" content="laravel, vue3, inertiajs, spa, real estate, listing" head-key="keywords" />
        </Head>

        <!-- Subtle background ambient glows -->
        <div
            class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-violet-200/40 rounded-full blur-3xl pointer-events-none -z-10">
        </div>
        <div
            class="absolute bottom-10 left-10 w-72 h-72 bg-indigo-200/30 rounded-full blur-3xl pointer-events-none -z-10">
        </div>

        <div class="max-w-3xl w-full text-center">
            <!-- Tag Badge -->
            <div
                class="inline-flex items-center gap-2 px-3 py-1 text-xs font-semibold rounded-full bg-violet-50 text-violet-700 border border-violet-100 shadow-xs mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-violet-500"></span>
                <span>About Page</span>
            </div>

            <!-- Hero Heading -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-tight">
                Welcome to <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 via-purple-500 to-indigo-600">About
                    Page</span>
            </h1>

            <!-- Subtitle -->
            <p class="mt-6 text-base sm:text-lg text-slate-600 max-w-xl mx-auto leading-relaxed">
                This page demonstrates client-side transitions powered by Inertia.js. No full page reloads,
                preserving client-side state smoothly.
            </p>

            <!-- CTA Buttons -->
            <div class="mt-8 flex flex-wrap items-center justify-center gap-3.5">
                <Link :href="route('frontend.index')"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-medium text-sm text-white bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 shadow-sm shadow-indigo-200 hover:shadow-md transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Back to Home</span>
                </Link>
            </div>
        </div>
    </main>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>