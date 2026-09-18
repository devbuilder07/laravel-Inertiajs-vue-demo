<template>

    <Head title="View List" />
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
        <!-- Top Navigation / Breadcrumbs -->
        <div class="mb-6 flex items-center justify-between">
            <Link href="/listing"
                class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-indigo-600 transition-colors group">
                <div
                    class="w-7 h-7 rounded-lg bg-white border border-slate-200/80 flex items-center justify-center group-hover:border-indigo-200 shadow-2xs transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                </div>
                <span>Back to Listings</span>
            </Link>

            <span
                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/70">
                <span class="relative flex h-2 w-2">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                </span>
                Active Listing
            </span>
        </div>

        <!-- Listing Content -->
        <div v-if="listing" class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
            <!-- Property Header & Price -->
            <div class="p-6 sm:p-8">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                    <div>
                        <div
                            class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-lg mb-3">
                            Residential Property #{{ listing.id }}
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                            {{ listing.street_no }} {{ listing.street }}
                        </h1>
                        <div class="flex items-center gap-2 text-sm text-slate-500 mt-2">
                            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>{{ listing.city }}, {{ listing.code }}</span>
                        </div>
                    </div>

                    <!-- Main Price Display -->
                    <div class="md:text-right border-t md:border-t-0 pt-4 md:pt-0 border-slate-100">
                        <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Price</div>
                        <div class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight mt-0.5">
                            ${{ Number(listing.price).toLocaleString() }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Key Metrics Bar -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-6 sm:p-8 bg-slate-50/70 border-y border-slate-100">
                <!-- Beds -->
                <div class="flex items-center gap-3.5 p-4 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                    <div
                        class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <div>
                        <span
                            class="text-xs font-semibold uppercase tracking-wider text-slate-400 block">Bedrooms</span>
                        <span class="text-lg font-extrabold text-slate-900">{{ listing.beds }}</span>
                    </div>
                </div>

                <!-- Baths -->
                <div class="flex items-center gap-3.5 p-4 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                    <div
                        class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <span
                            class="text-xs font-semibold uppercase tracking-wider text-slate-400 block">Bathrooms</span>
                        <span class="text-lg font-extrabold text-slate-900">{{ listing.baths }}</span>
                    </div>
                </div>

                <!-- Area -->
                <div class="flex items-center gap-3.5 p-4 rounded-xl bg-white border border-slate-200/80 shadow-2xs">
                    <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-slate-400 block">Living
                            Area</span>
                        <span class="text-lg font-extrabold text-slate-900">
                            {{ Number(listing.area).toLocaleString() }} <span
                                class="text-xs font-normal text-slate-500">sq ft</span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Property Specifications & Monthly Payment Calculator -->
            <div class="p-6 sm:p-8">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                    <!-- Property Specifications -->
                    <div class="md:col-span-7">
                        <h2
                            class="text-base font-bold text-slate-900 mb-5 pb-3 border-b border-slate-100 flex items-center gap-2">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Property Specifications
                        </h2>

                        <div class="space-y-1 text-sm">
                            <div class="flex justify-between py-2.5 border-b border-slate-100">
                                <span class="text-slate-500 font-medium">Street Address</span>
                                <span class="text-slate-900 font-semibold">{{ listing.street_no }} {{ listing.street
                                    }}</span>
                            </div>

                            <div class="flex justify-between py-2.5 border-b border-slate-100">
                                <span class="text-slate-500 font-medium">City</span>
                                <span class="text-slate-900 font-semibold">{{ listing.city }}</span>
                            </div>

                            <div class="flex justify-between py-2.5 border-b border-slate-100">
                                <span class="text-slate-500 font-medium">Postal / ZIP Code</span>
                                <span
                                    class="font-mono text-xs text-slate-700 bg-slate-100 px-2 py-0.5 rounded border border-slate-200/60 font-semibold">
                                    {{ listing.code }}
                                </span>
                            </div>

                            <div class="flex justify-between py-2.5 border-b border-slate-100">
                                <span class="text-slate-500 font-medium">Price per Sq Ft</span>
                                <span class="text-slate-900 font-semibold">${{ pricePerSqFt.toLocaleString() }} / sq
                                    ft</span>
                            </div>

                            <div class="flex justify-between py-2.5 border-b border-slate-100">
                                <span class="text-slate-500 font-medium">Bedrooms</span>
                                <span class="text-slate-900 font-semibold">{{ listing.beds }} Rooms</span>
                            </div>

                            <div class="flex justify-between py-2.5 border-b border-slate-100">
                                <span class="text-slate-500 font-medium">Bathrooms</span>
                                <span class="text-slate-900 font-semibold">{{ listing.baths }} Baths</span>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Payment Calculator Card -->
                    <div class="md:col-span-5">
                        <div class="bg-white rounded-xl border border-slate-200/80 p-5 sm:p-6 shadow-2xs">
                            <h3 class="text-base font-semibold text-slate-800 mb-4">
                                Monthly Payment
                            </h3>

                            <div class="space-y-4">
                                <!-- Interest Rate Slider -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-600 mb-2">
                                        Interest rate ({{ interestRate }}%)
                                    </label>
                                    <input v-model.number="interestRate" type="range" min="0.1" max="30" step="0.1"
                                        class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-blue-600 focus:outline-none" />
                                </div>

                                <!-- Duration Slider -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-600 mb-2">
                                        Duration ({{ duration }} years)
                                    </label>
                                    <input v-model.number="duration" type="range" min="3" max="35" step="1"
                                        class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-blue-600 focus:outline-none" />
                                </div>

                                <!-- Result -->
                                <div class="pt-3">
                                    <div class="text-xs text-slate-400 font-medium">
                                        Your monthly payment
                                    </div>
                                    <div class="text-3xl font-extrabold text-slate-800 tracking-tight mt-1">
                                        ${{ monthlyPayment.toLocaleString() }}
                                    </div>

                                    <!-- Total Paid & Total Interest Breakdown -->
                                    <div
                                        class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                                        <div>
                                            <span class="text-slate-400 block font-medium">Total Paid</span>
                                            <span class="font-bold text-slate-700">${{ totalPaid.toLocaleString()
                                                }}</span>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-slate-400 block font-medium">Total Interest</span>
                                            <span class="font-bold text-slate-700">${{ totalInterest.toLocaleString()
                                                }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div
                class="p-6 sm:p-8 bg-slate-50/50 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                <Link :href="route('frontend.listing.index')"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl font-semibold text-sm text-slate-700 bg-white hover:bg-slate-100 border border-slate-200 shadow-2xs transition-colors">
                    <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    <span>All Listings</span>
                </Link>

                <Link :href="route('frontend.listing.create')"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl font-semibold text-sm text-white bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 shadow-sm shadow-indigo-200 transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span>Create New Listing</span>
                </Link>
            </div>
        </div>

        <!-- Empty State if Listing Not Found -->
        <div v-else class="bg-white rounded-2xl border border-slate-200/80 p-12 text-center shadow-xs">
            <div
                class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
            <h3 class="text-base font-bold text-slate-900">Listing not found</h3>
            <p class="text-sm text-slate-500 mt-1">The requested property listing could not be located.</p>
            <div class="mt-6">
                <Link :href="route('frontend.listing.index')"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-600 hover:text-white transition-colors">
                    Return to Listing Directory
                </Link>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment';

const props = defineProps({
    listing: Object,
});

const interestRate = ref(2.5);
const duration = ref(25);
// Price per square foot calculation
const pricePerSqFt = computed(() => {
    if (!props.listing?.price || !props.listing?.area || Number(props.listing.area) === 0) {
        return 0;
    }
    return Math.round(Number(props.listing.price) / Number(props.listing.area));
});

// Monthly payment calculation
const { monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(
    () => props.listing?.price,
    duration,
    interestRate
);
</script>