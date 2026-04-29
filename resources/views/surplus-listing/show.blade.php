<x-app-layout>
    <div class="min-h-screen bg-slate-50 py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">

            <div class="mb-6">
                <a href="{{ route('surplus-listing.index') }}"
                    class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-700">
                    ← Back to Listings
                </a>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="p-6 sm:p-8 lg:p-10">

                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6 mb-8">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-20 h-20 rounded-2xl bg-indigo-100 text-indigo-700 flex items-center justify-center text-3xl font-bold shadow-sm">
                                {{ strtoupper(substr($surplus_listing->title, 0, 1)) }}
                            </div>

                            <div>
                                <h1 class="text-3xl font-bold text-slate-900">
                                    {{ $surplus_listing->title }}
                                </h1>
                                <p class="mt-2 text-slate-600">
                                    {{ $surplus_listing->description }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <span
                                class="inline-flex items-center rounded-full px-3 py-1 text-sm font-semibold
                                {{ $surplus_listing->status === 'available' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-700' }}">
                                {{ ucfirst($surplus_listing->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Original Price</p>
                            <p class="mt-1 text-lg font-semibold text-slate-900">
                                €{{ number_format($surplus_listing->original_price, 2) }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Discounted Price</p>
                            <p class="mt-1 text-lg font-semibold text-indigo-600">
                                €{{ number_format($surplus_listing->discounted_price, 2) }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Savings</p>
                            <p class="mt-1 text-lg font-semibold text-emerald-600">
                                €{{ number_format($surplus_listing->original_price - $surplus_listing->discounted_price, 2) }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Quantity Available</p>
                            <p class="mt-1 text-lg font-semibold text-slate-900">
                                {{ $surplus_listing->quantity_available }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Pickup Start</p>
                            <p class="mt-1 text-base font-medium text-slate-800">
                                {{ $surplus_listing->pickup_start }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Pickup End</p>
                            <p class="mt-1 text-base font-medium text-slate-800">
                                {{ $surplus_listing->pickup_end }}
                            </p>
                        </div>
                    </div>

                    <div
                        class="border-t border-slate-200 pt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <p class="text-sm text-slate-500">Listing ID</p>
                            <p class="text-base font-medium text-slate-800">
                                {{ $surplus_listing->id }}
                            </p>
                        </div>

                        <div class="flex gap-3">
                            <a href="{{ route('surplus-listing.index') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 transition">
                                Back
                            </a>

                            <a href="{{ route('business.show', $surplus_listing->business_id) }}"
                                class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 transition">
                                View Business
                            </a>

                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('surplus-listing.edit', $surplus_listing) }}"
                                        class="inline-flex items-center rounded-xl bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 transition">
                                        Edit Listing
                                    </a>
                                @endif
                            @endauth

                            <a href="#"
                                class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-700 transition">
                                Reserve Item
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>