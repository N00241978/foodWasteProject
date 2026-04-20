<x-app-layout>
    <div class="min-h-screen bg-slate-50 py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between">
                <div class="mb-10">
                    <h1 class="text-3xl sm:text-4xl font-bold text-slate-900">Surplus Listings</h1>
                    <p class="mt-2 text-slate-600">Browse available surplus items and their collection details.</p>
                </div>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <div>
                            <a href="{{ route('surplus-listing.create') }}"
                                class="inline-flex items-center rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-700 transition">
                                Create New Listing
                            </a>
                        </div>
                    @endif
                @endauth
            </div>

            @if ($surplus_listings->isEmpty())
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-10 text-center">
                    <h2 class="text-xl font-semibold text-slate-800">No listings available</h2>
                    <p class="mt-2 text-slate-500">There are currently no surplus listings to display.</p>
                </div>
            @else
                @foreach ($surplus_listings as $surplus_listing)
                    <!-- 3 COLUMN GRID -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($surplus_listings as $surplus_listing)
                            <div
                                class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md transition overflow-hidden">

                                <div class="p-5 flex flex-col h-full">

                                    <!-- Header -->
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-14 h-14 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center text-xl font-bold">
                                                {{ strtoupper(substr($surplus_listing->title, 0, 1)) }}
                                            </div>

                                            <h2 class="text-lg font-bold text-slate-900 leading-tight">
                                                {{ $surplus_listing->title }}
                                            </h2>
                                        </div>

                                        <span
                                            class="text-xs font-semibold px-2 py-1 rounded-full
                                                                                                                                                                                                                                                                                                                                                                                                                                            {{ $surplus_listing->status === 'available' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-700' }}">
                                            {{ ucfirst($surplus_listing->status) }}
                                        </span>
                                    </div>

                                    <!-- Description -->
                                    <p class="text-sm text-slate-600 mb-4">
                                        {{ $surplus_listing->description }}
                                    </p>

                                    <!-- Prices -->
                                    <div class="flex justify-between items-center mb-4">
                                        <div>
                                            <p class="text-xs text-slate-500">Original</p>
                                            <p class="text-sm line-through text-slate-400">
                                                €{{ number_format($surplus_listing->original_price, 2) }}
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-xs text-slate-500">Now</p>
                                            <p class="text-lg font-bold text-indigo-600">
                                                €{{ number_format($surplus_listing->discounted_price, 2) }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Pickup -->
                                    <div class="text-xs text-slate-500 mb-4">
                                        <p><strong>Pickup:</strong></p>
                                        <p>{{ $surplus_listing->pickup_start }} → {{ $surplus_listing->pickup_end }}</p>
                                    </div>

                                    <!-- Footer -->
                                    <div class="mt-auto flex justify-between items-center pt-4 border-t">
                                        <span class="text-sm font-semibold text-emerald-600">
                                            Save
                                            €{{ number_format($surplus_listing->original_price - $surplus_listing->discounted_price, 2) }}
                                        </span>

                                        <a href="{{ route('surplus-listing.show', $surplus_listing->id) }}"
                                            class="bg-indigo-600 text-white text-sm px-3 py-1.5 rounded-lg hover:bg-indigo-700">
                                            View
                                        </a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>