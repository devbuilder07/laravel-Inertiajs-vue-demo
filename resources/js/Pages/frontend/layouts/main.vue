<template>
    <div
        class="min-h-screen bg-slate-50 text-slate-800 flex flex-col selection:bg-indigo-500 selection:text-white font-sans">
        <!-- Top Navigation -->
        <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200/80">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
                <!-- Brand / Logo -->
                <Link href="/" class="flex items-center gap-2.5 group">
                    <div
                        class="w-9 h-9 rounded-xl bg-gradient-to-tr from-indigo-600 to-violet-500 flex items-center justify-center text-white font-bold shadow-sm shadow-indigo-200 group-hover:scale-105 transition-transform duration-200">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span
                        class="text-base font-bold tracking-tight text-slate-900 group-hover:text-indigo-600 transition-colors">InertiaApp</span>
                </Link>

                <!-- Navigation Links -->
                <nav class="flex items-center gap-1.5 sm:gap-2">
                    <Link :href="route('frontend.index')" :class="[
                        'px-3.5 py-1.5 text-sm rounded-lg transition-colors',
                        $page.url === '/'
                            ? 'font-semibold bg-indigo-50 text-indigo-600'
                            : 'font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100'
                    ]">
                        Home
                    </Link>
                    <Link :href="route('frontend.about')" :class="[
                        'px-3.5 py-1.5 text-sm rounded-lg transition-colors',
                        $page.url.startsWith('/about')
                            ? 'font-semibold bg-indigo-50 text-indigo-600'
                            : 'font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100'
                    ]">
                        About
                    </Link>
                    <Link :href="route('frontend.listing.index')" :class="[
                        'px-3.5 py-1.5 text-sm rounded-lg transition-colors',
                        $page.url.startsWith('/listing')
                            ? 'font-semibold bg-indigo-50 text-indigo-600'
                            : 'font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100'
                    ]">
                        Listing
                    </Link>
                </nav>

                <!-- Right Action / Status (Persistent Layout Timer) -->
                <div class="flex items-center gap-3">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 text-xs font-medium rounded-full bg-slate-100 text-slate-700 border border-slate-200/80 shadow-2xs"
                        title="Persistent layout timer: maintains count across page navigation">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        <span>Timer: <span class="font-mono font-bold text-slate-900">{{ timer }}s</span></span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Slot -->
        <slot />

        <!-- Minimalist Footer -->
        <footer class="py-6 border-t border-slate-200/70 bg-white/50 text-center text-xs text-slate-400">
            <p>Laravel + Inertia.js + Vue 3</p>
        </footer>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const timer = ref(0);

setInterval(() => {
    timer.value++;
}, 1000);
</script>