<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-emerald-50 via-lime-50 to-amber-50 py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">

            <div class="mb-6">
                <a href="{{ route('surplus-listing.index') }}"
                    class="inline-flex items-center text-sm font-bold text-emerald-700 hover:text-emerald-900">
                    ← Back to surplus food
                </a>
            </div>

            <div class="bg-white border border-emerald-100 rounded-3xl shadow-sm overflow-hidden">

                @if($surplus_listing->image)
                    <img src="{{ asset('images/surplus-listings/' . $surplus_listing->image) }}"
                        alt="{{ $surplus_listing->title }}" class="w-full h-80 object-cover">
                @else
                    <div class="w-full h-80 bg-emerald-100 flex items-center justify-center text-emerald-700 text-lg">
                        No Image Available
                    </div>
                @endif

                <div class="p-6 sm:p-8 lg:p-10">

                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6 mb-8">
                        <div>
                            <span class="inline-flex items-center rounded-full bg-lime-200 px-4 py-1 text-sm font-bold text-emerald-900">
                                🌱 Surplus food rescue
                            </span>

                            <h1 class="mt-4 text-3xl sm:text-4xl font-extrabold text-emerald-950">
                                {{ $surplus_listing->title }}
                            </h1>

                            <p class="mt-3 text-slate-600 max-w-2xl">
                                {{ $surplus_listing->description }}
                            </p>
                        </div>

                        <span class="inline-flex items-center rounded-full px-4 py-1 text-sm font-bold
                            {{ $surplus_listing->status === 'available'
                                ? 'bg-lime-200 text-emerald-900'
                                : 'bg-slate-100 text-slate-600' }}">
                            {{ ucfirst($surplus_listing->status) }}
                        </span>
                    </div>

                    <div class="rounded-3xl bg-emerald-950 p-6 mb-8 text-white">
                        <p class="text-sm text-lime-200 font-bold">Rescue price</p>

                        <div class="mt-2 flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                            <div>
                                <p class="text-4xl font-extrabold">
                                    €{{ number_format($surplus_listing->discounted_price, 2) }}
                                </p>
                                <p class="mt-1 text-sm text-emerald-100">
                                    Usually €{{ number_format($surplus_listing->original_price, 2) }}
                                </p>
                            </div>

                            <div class="rounded-2xl bg-lime-300 px-5 py-3 text-emerald-950">
                                <p class="text-xs font-bold">You save</p>
                                <p class="text-2xl font-extrabold">
                                    €{{ number_format($surplus_listing->original_price - $surplus_listing->discounted_price, 2) }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                        <div class="rounded-2xl bg-emerald-50 border border-emerald-100 p-5">
                            <p class="text-sm text-emerald-700">Quantity available</p>
                            <p class="mt-1 text-2xl font-extrabold text-emerald-950">
                                {{ $surplus_listing->quantity_available }}
                            </p>
                        </div>

                        <div class="rounded-2xl bg-emerald-50 border border-emerald-100 p-5">
                            <p class="text-sm text-emerald-700">Pickup starts</p>
                            <p class="mt-1 text-base font-bold text-emerald-950">
                                {{ $surplus_listing->pickup_start }}
                            </p>
                        </div>

                        <div class="rounded-2xl bg-emerald-50 border border-emerald-100 p-5">
                            <p class="text-sm text-emerald-700">Pickup ends</p>
                            <p class="mt-1 text-base font-bold text-emerald-950">
                                {{ $surplus_listing->pickup_end }}
                            </p>
                        </div>
                    </div>

                    <div class="rounded-3xl bg-amber-50 border border-amber-100 p-5 mb-8">
                        <h2 class="text-lg font-bold text-emerald-950">
                            Why reserve this?
                        </h2>
                        <p class="mt-2 text-sm text-slate-600">
                            By reserving this item, you help prevent good food from being wasted while supporting a local business.
                        </p>
                    </div>

                    <div class="border-t border-emerald-100 pt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <p class="text-sm text-emerald-700">Listing ID</p>
                            <p class="text-base font-bold text-emerald-950">
                                {{ $surplus_listing->id }}
                            </p>
                        </div>

                        <div class="flex gap-3 flex-wrap">
                            <a href="{{ route('surplus-listing.index') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-emerald-200 bg-white px-5 py-2.5 text-sm font-bold text-emerald-800 hover:bg-emerald-50 transition">
                                Back
                            </a>

                            <a href="{{ route('business.show', $surplus_listing->business_id) }}"
                                class="inline-flex items-center justify-center rounded-xl border border-emerald-200 bg-white px-5 py-2.5 text-sm font-bold text-emerald-800 hover:bg-emerald-50 transition">
                                View Business
                            </a>

                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('surplus-listing.edit', $surplus_listing) }}"
                                        class="inline-flex items-center rounded-xl bg-emerald-700 px-4 py-2 text-sm font-bold text-white hover:bg-emerald-800 transition">
                                        Edit Listing
                                    </a>
                                @endif
                            @endauth

                            <form action="{{ route('surplus-listing.reserve', $surplus_listing) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-xl bg-amber-400 px-5 py-2.5 text-sm font-extrabold text-emerald-950 hover:bg-amber-300 transition">
                                    Reserve Item
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>