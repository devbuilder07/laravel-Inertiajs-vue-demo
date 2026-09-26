<template>
    <nav class="flex items-center gap-1.5" aria-label="Pagination">
        <template v-for="(link, index) in links" :key="index">
            <!-- Active page -->
            <Link v-if="link.url && link.active" :href="link.url"
                class="inline-flex items-center justify-center min-w-[36px] h-9 px-3 rounded-xl text-sm font-semibold bg-indigo-600 text-white shadow-sm transition-all duration-150"
                v-html="link.label" />

            <!-- Clickable (non-active) page -->
            <Link v-else-if="link.url" :href="link.url"
                class="inline-flex items-center justify-center min-w-[36px] h-9 px-3 rounded-xl text-sm font-medium text-slate-600 bg-white border border-slate-200/80 hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-200 transition-all duration-150"
                v-html="link.label" />

            <!-- Disabled (no url) -->
            <span v-else
                class="inline-flex items-center justify-center min-w-[36px] h-9 px-3 rounded-xl text-sm font-medium text-slate-300 bg-slate-50 border border-slate-100 cursor-not-allowed select-none"
                v-html="link.label" />
        </template>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({ links: Array })
</script>