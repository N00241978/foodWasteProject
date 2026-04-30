<x-app-layout>
    <div class="min-h-screen bg-slate-50 py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">

            <div class="mb-6">
                <a href="{{ route('surplus-listing.index') }}"
                    class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-700">
                    ← Back to Listings
                </a>
            </div>

            <h1 class="text-3xl font-bold text-slate-900 mb-8">My Cart</h1>

            @if(session('success'))
                <div class="mb-6 rounded-xl bg-green-100 text-green-700 p-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($cart && $cart->surplusListings->count() > 0)
                <div class="grid grid-cols-1 gap-6">
                    @foreach($cart->surplusListings as $listing)
                        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                            <div class="flex flex-col md:flex-row">

                                <div class="md:w-64 w-full">
                                        <img src="{{ asset('images/surplus-listings/' . $listing->image) }}"
                                            alt="{{ $listing->title }}"
                                            class="w-full h-56 md:h-full object-cover">
                                </div>

                                <div class="flex-1 p-6">
                                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mb-5">
                                        <div>
                                            <h2 class="text-2xl font-bold text-slate-900">
                                                {{ $listing->title }}
                                            </h2>

                                            <p class="mt-2 text-slate-600">
                                                {{ $listing->description }}
                                            </p>
                                        </div>

                                        <span class="inline-flex w-fit items-center rounded-full bg-green-100 text-green-700 px-3 py-1 text-sm font-semibold">
                                            Reserved
                                        </span>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                                            <p class="text-sm text-slate-500">Price</p>
                                            <p class="mt-1 text-lg font-semibold text-indigo-600">
                                                €{{ number_format($listing->discounted_price, 2) }}
                                            </p>
                                        </div>

                                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                                            <p class="text-sm text-slate-500">Original Price</p>
                                            <p class="mt-1 text-lg font-semibold text-slate-900">
                                                €{{ number_format($listing->original_price, 2) }}
                                            </p>
                                        </div>

                                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                                            <p class="text-sm text-slate-500">Pickup Start</p>
                                            <p class="mt-1 text-sm font-medium text-slate-800">
                                                {{ $listing->pickup_start }}
                                            </p>
                                        </div>

                                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                                            <p class="text-sm text-slate-500">Pickup End</p>
                                            <p class="mt-1 text-sm font-medium text-slate-800">
                                                {{ $listing->pickup_end }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="border-t border-slate-200 pt-5 flex justify-end gap-3">
                                        <a href="{{ route('surplus-listing.show', $listing) }}"
                                            class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 transition">
                                            View Listing
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-10 text-center">
                    <h2 class="text-2xl font-bold text-slate-900">Your cart is empty</h2>
                    <p class="mt-2 text-slate-600">Reserve a surplus listing to add it here.</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>