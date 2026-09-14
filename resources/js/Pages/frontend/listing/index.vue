<template>
    <Layout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Listing Page</h1>
                    <p class="text-sm text-slate-500 mt-1">Overview of all real estate properties and specifications</p>
                </div>
                <div
                    class="text-xs sm:text-sm font-medium text-slate-600 bg-white px-3.5 py-1.5 rounded-xl border border-slate-200/80 shadow-2xs w-fit">
                    Total: <span class="font-bold text-slate-900">{{ listings ? listings.length : 0 }}</span> listings
                </div>
                <Link href="/listing/create"
                    class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-600 hover:text-white transition-colors duration-150">
                    <span>Create</span>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </Link>
            </div>

            <!-- Flash Message Banner -->
            <div v-if="flashSuccess && !isDismissed"
                class="mb-6 flex items-center justify-between gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-200/80 text-emerald-800 shadow-2xs"
                role="alert">
                <div class="flex items-center gap-3">
                    <div
                        class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <strong class="font-bold text-sm text-emerald-900 mr-1.5">Success!</strong>
                        <span class="text-sm font-medium text-emerald-700">{{ flashSuccess }}</span>
                    </div>
                </div>

                <button type="button" @click="isDismissed = true"
                    class="p-1.5 rounded-xl text-emerald-600 hover:text-emerald-800 hover:bg-emerald-100/80 transition-colors cursor-pointer"
                    title="Dismiss" aria-label="Dismiss alert">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modern Table Container -->
            <div class="overflow-x-auto rounded-2xl border border-slate-200/80 bg-white shadow-xs">

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-slate-50/80 border-b border-slate-200/80 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                            <th class="py-3.5 px-4 text-center">Beds</th>
                            <th class="py-3.5 px-4 text-center">Baths</th>
                            <th class="py-3.5 px-4 text-center">Area</th>
                            <th class="py-3.5 px-4">City</th>
                            <th class="py-3.5 px-4">Code</th>
                            <th class="py-3.5 px-4">Street</th>
                            <th class="py-3.5 px-4">Street No</th>
                            <th class="py-3.5 px-4 text-right">Price</th>
                            <th class="py-3.5 px-4 sm:px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        <tr v-for="listing in listings" :key="listing.id"
                            class="hover:bg-indigo-50/40 transition-colors group">
                            <!-- Beds -->
                            <td class="py-4 px-4 text-center">
                                <span
                                    class="inline-flex items-center justify-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-slate-100 text-slate-700">
                                    {{ listing.beds }}
                                </span>
                            </td>

                            <!-- Baths -->
                            <td class="py-4 px-4 text-center">
                                <span
                                    class="inline-flex items-center justify-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-slate-100 text-slate-700">
                                    {{ listing.baths }}
                                </span>
                            </td>

                            <!-- Area -->
                            <td class="py-4 px-4 text-center text-slate-700 font-medium whitespace-nowrap">
                                {{ Number(listing.area).toLocaleString() }} <span class="text-xs text-slate-400">sq
                                    ft</span>
                            </td>

                            <!-- City -->
                            <td class="py-4 px-4 font-semibold text-slate-900 whitespace-nowrap">
                                {{ listing.city }}
                            </td>

                            <!-- Code -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <span
                                    class="font-mono text-xs text-slate-500 bg-slate-100 px-2 py-0.5 rounded border border-slate-200/60">
                                    {{ listing.code }}
                                </span>
                            </td>

                            <!-- Street -->
                            <td class="py-4 px-4 text-slate-700 whitespace-nowrap">
                                {{ listing.street }}
                            </td>

                            <!-- Street No -->
                            <td class="py-4 px-4 text-slate-600 whitespace-nowrap">
                                {{ listing.street_no }}
                            </td>

                            <!-- Price -->
                            <td class="py-4 px-4 text-right font-extrabold text-slate-900 text-base whitespace-nowrap">
                                ${{ Number(listing.price).toLocaleString() }}
                            </td>

                            <!-- Action -->
                            <td class="py-4 px-4 sm:px-6 text-center whitespace-nowrap">
                                <Link :href="route('frontend.listing.show', listing.id)"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-600 hover:text-white transition-colors duration-150">
                                    <span>View</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </Link>
                                <Link :href="route('frontend.listing.edit', listing.id)"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-600 hover:text-white transition-colors duration-150 ml-1.5">
                                    <span>Edit</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                                    </svg>
                                </Link>
                                <button type="button" @click="confirmDelete(listing.id)"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold text-rose-600 bg-rose-50 hover:bg-rose-600 hover:text-white transition-colors duration-150 ml-1.5 cursor-pointer">
                                    <span>Delete</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr v-if="!listings || listings.length === 0">
                            <td colspan="9" class="py-8 text-center text-slate-400 text-sm">
                                No property listings available.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { Link, router, usePage } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import { computed, ref, watch } from 'vue';

const page = usePage();
const flashSuccess = computed(() => page.props.flash?.success);
const isDismissed = ref(false);

watch(flashSuccess, (newVal) => {
    if (newVal) {
        isDismissed.value = false;
    }
});

const props_data = defineProps({
    listings: Array,
});

const confirmDelete = (id) => {
    Swal.fire({
        title: 'Are you sure?',
        text: 'This listing will be permanently deleted!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e11d48',
        cancelButtonColor: '#64748b',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('frontend.listing.destroy', { listing: id }));
        }
    });
};
// console.log(`Pass data from controller ${JSON.stringify(props_data.listings)}`);
</script>