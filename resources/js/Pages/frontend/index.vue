<template>
    <main
        class="flex-1 flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 py-16 sm:py-24 relative overflow-hidden">

        <Head title="Home - Laravel Vue Inertia" />

        <!-- Subtle background ambient glows -->
        <div
            class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-indigo-200/40 rounded-full blur-3xl pointer-events-none -z-10">
        </div>
        <div
            class="absolute bottom-10 right-10 w-72 h-72 bg-violet-200/30 rounded-full blur-3xl pointer-events-none -z-10">
        </div>

        <div class="max-w-3xl w-full text-center">
            <!-- Tag Badge -->
            <div
                class="inline-flex items-center gap-2 px-3 py-1 text-xs font-semibold rounded-full bg-indigo-50 text-indigo-700 border border-indigo-100 shadow-xs mb-6">
                <span class="flex h-2 w-2 relative">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-600"></span>
                </span>
                <span>Laravel + Inertia + Vue 3</span>
            </div>

            <!-- Hero Heading -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-tight">
                Welcome to <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-indigo-500 to-violet-600">Home
                    Page</span>
            </h1>

            <!-- Subtitle -->
            <p class="mt-6 text-base sm:text-lg text-slate-600 max-w-xl mx-auto leading-relaxed">
                A clean, fast, and modern starter built with Laravel, Inertia.js, and Vue 3. Seamless SPA experience
                powered by server-side routing.
            </p>

            <!-- CTA Buttons -->
            <div class="mt-8 flex flex-wrap items-center justify-center gap-3.5">
                <Link :href="route('frontend.about')"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-medium text-sm text-white bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 shadow-sm shadow-indigo-200 hover:shadow-md transition-all duration-200">
                    <span>Visit About Page</span>
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </Link>
                <a href="https://inertiajs.com" target="_blank" rel="noreferrer"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-medium text-sm text-slate-700 bg-white hover:bg-slate-50 active:bg-slate-100 border border-slate-200 shadow-xs transition-colors duration-200">
                    <span>Inertia Docs</span>
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>

            <!-- Feature Cards -->
            <div class="mt-14 grid grid-cols-1 sm:grid-cols-3 gap-4 text-left">
                <div
                    class="p-5 rounded-2xl bg-white border border-slate-200/70 shadow-xs hover:shadow-sm transition-shadow">
                    <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center mb-3">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h2 class="text-sm font-bold text-slate-900">Inertia v3</h2>
                    <p class="mt-1 text-xs text-slate-500 leading-relaxed">Client-side navigation without complex
                        API architectures.</p>
                </div>

                <div
                    class="p-5 rounded-2xl bg-white border border-slate-200/70 shadow-xs hover:shadow-sm transition-shadow">
                    <div class="w-8 h-8 rounded-lg bg-violet-50 text-violet-600 flex items-center justify-center mb-3">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </div>
                    <h2 class="text-sm font-bold text-slate-900">Vue 3</h2>
                    <p class="mt-1 text-xs text-slate-500 leading-relaxed">Reactive components using Composition API
                        and script setup.</p>
                </div>

                <div
                    class="p-5 rounded-2xl bg-white border border-slate-200/70 shadow-xs hover:shadow-sm transition-shadow">
                    <div class="w-8 h-8 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center mb-3">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                    </div>
                    <h2 class="text-sm font-bold text-slate-900">Tailwind CSS</h2>
                    <p class="mt-1 text-xs text-slate-500 leading-relaxed">Modern styling with utility classes and
                        clean design tokens.</p>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';

const props_data = defineProps({
    frameworks: Array,
});
// console.log(`Pass data from controller ${JSON.stringify(props_data)}`);
</script>