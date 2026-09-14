<template>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">
        <!-- Page Header & Navigation -->
        <div class="mb-8">
            <div class="flex items-center gap-2 mb-3">
                <Link href="/listing"
                    class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-indigo-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Back to Listings
                </Link>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Create Listing</h1>
                    <p class="text-sm text-slate-500 mt-1">Fill in property details, location, and pricing to publish a
                        new listing.</p>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
            <form @submit.prevent="create" class="p-6 sm:p-8 space-y-8">
                <!-- Section 1: Property Specifications -->
                <div>
                    <div class="flex items-center gap-2 pb-3 mb-5 border-b border-slate-100">
                        <div class="w-7 h-7 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <h2 class="text-base font-bold text-slate-900">Property Details</h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                        <!-- Beds -->
                        <div>
                            <label for="beds" class="label">
                                Beds
                            </label>
                            <input id="beds" type="number" min="0" v-model.number="form.beds" placeholder="e.g. 3"
                                class="block w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                                :class="{ 'border-rose-400 focus:border-rose-500 focus:ring-rose-500/10': form.errors.beds }" />
                            <p v-if="form.errors.beds" class="input-error">{{
                                form.errors.beds }}</p>
                        </div>

                        <!-- Baths -->
                        <div>
                            <label for="baths" class="label">
                                Baths
                            </label>
                            <input id="baths" type="number" min="0" v-model.number="form.baths" placeholder="e.g. 2"
                                class="block w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                                :class="{ 'border-rose-400 focus:border-rose-500 focus:ring-rose-500/10': form.errors.baths }" />
                            <p v-if="form.errors.baths" class="input-error">{{
                                form.errors.baths }}</p>
                        </div>

                        <!-- Area -->
                        <div>
                            <label for="area" class="label">
                                Area <span class="normal-case text-slate-400 font-normal">(sq ft)</span>
                            </label>
                            <input id="area" type="number" min="0" v-model.number="form.area" placeholder="e.g. 1500"
                                class="block w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                                :class="{ 'border-rose-400 focus:border-rose-500 focus:ring-rose-500/10': form.errors.area }" />
                            <p v-if="form.errors.area" class="input-error">{{
                                form.errors.area }}</p>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Location Information -->
                <div>
                    <div class="flex items-center gap-2 pb-3 mb-5 border-b border-slate-100">
                        <div class="w-7 h-7 rounded-lg bg-violet-50 text-violet-600 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h2 class="text-base font-bold text-slate-900">Address & Location</h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-6 gap-5">
                        <!-- Street -->
                        <div class="sm:col-span-4">
                            <label for="street" class="label">Street</label>
                            <input id="street" type="text" v-model="form.street" placeholder="e.g. Broadway"
                                class="block w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                                :class="{ 'border-rose-400 focus:border-rose-500 focus:ring-rose-500/10': form.errors.street }" />
                            <p v-if="form.errors.street" class="input-error">{{
                                form.errors.street }}</p>
                        </div>

                        <!-- Street Nr -->
                        <div class="sm:col-span-2">
                            <label for="street_no" class="label">Street Nr</label>
                            <input id="street_no" type="text" v-model="form.street_no" placeholder="e.g. 10B"
                                class="block w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                                :class="{ 'border-rose-400 focus:border-rose-500 focus:ring-rose-500/10': form.errors.street_no }" />
                            <p v-if="form.errors.street_no" class="input-error">{{
                                form.errors.street_no }}</p>
                        </div>

                        <!-- City -->
                        <div class="sm:col-span-4">
                            <label for="city" class="label">City</label>
                            <input id="city" type="text" v-model="form.city" placeholder="e.g. New York"
                                class="block w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                                :class="{ 'border-rose-400 focus:border-rose-500 focus:ring-rose-500/10': form.errors.city }" />
                            <p v-if="form.errors.city" class="input-error">{{
                                form.errors.city }}</p>
                        </div>

                        <!-- Post Code -->
                        <div class="sm:col-span-2">
                            <label for="code" class="label">Post Code</label>
                            <input id="code" type="text" v-model="form.code" placeholder="e.g. 10001"
                                class="block w-full rounded-xl border border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                                :class="{ 'border-rose-400 focus:border-rose-500 focus:ring-rose-500/10': form.errors.code }" />
                            <p v-if="form.errors.code" class="input-error">{{
                                form.errors.code }}</p>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Pricing -->
                <div>
                    <div class="flex items-center gap-2 pb-3 mb-5 border-b border-slate-100">
                        <div class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h2 class="text-base font-bold text-slate-900">Pricing</h2>
                    </div>

                    <div class="max-w-xs">
                        <label for="price" class="label">Price</label>
                        <div class="relative rounded-xl">
                            <div
                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 font-semibold text-sm">
                                $
                            </div>
                            <input id="price" type="number" min="0" v-model.number="form.price" placeholder="250,000"
                                class="block w-full rounded-xl border border-slate-200 bg-slate-50/50 pl-8 pr-3.5 py-2.5 text-sm font-semibold text-slate-900 placeholder:text-slate-400 placeholder:font-normal focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                                :class="{ 'border-rose-400 focus:border-rose-500 focus:ring-rose-500/10': form.errors.price }" />
                        </div>
                        <p v-if="form.errors.price" class="input-error">{{
                            form.errors.price }}</p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                    <Link href="/listing"
                        class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                        Cancel
                    </Link>
                    <button type="submit" :disabled="form.processing"
                        class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-xl font-semibold text-sm text-white bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 shadow-sm shadow-indigo-200 hover:shadow-md transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg v-if="form.processing" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span>Create Listing</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    beds: null,
    baths: null,
    area: null,
    city: '',
    code: '',
    street: '',
    street_no: '',
    price: null,
});

const create = () => {
    form.post(route('frontend.listing.store'));
};
</script>