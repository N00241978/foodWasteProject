<x-app-layout>
    <div class="min-h-screen bg-slate-50 py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-10">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-bold text-slate-900">Surplus Listings</h1>
                    <p class="mt-2 text-slate-600">Browse available surplus items and their collection details.</p>
                </div>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('surplus-listing.create') }}"
                            class="inline-flex items-center rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-700 transition">
                            Create New Listing
                        </a>
                    @endif
                @endauth
            </div>

            @if ($surplus_listings->isEmpty())
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-10 text-center">
                    <h2 class="text-xl font-semibold text-slate-800">No listings available</h2>
                    <p class="mt-2 text-slate-500">There are currently no surplus listings to display.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($surplus_listings as $surplus_listing)
                        <div
                            class="bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md transition overflow-hidden flex flex-col">

                            {{-- IMAGE --}}
                            @if($surplus_listing->image)
                                <img src="{{ asset('images/surplus-listings/' . $surplus_listing->image) }}"
                                    alt="{{ $surplus_listing->title }}" class="w-full h-56 object-cover">
                            @else
                                <div class="w-full h-56 bg-slate-200 flex items-center justify-center text-slate-500">
                                    No Image
                                </div>
                            @endif

                            <div class="p-5 flex flex-col flex-1">

                                {{-- Header --}}
                                <div class="flex items-start justify-between gap-4 mb-4">
                                    <div>
                                        <h2 class="text-xl font-bold text-slate-900 leading-tight">
                                            {{ $surplus_listing->title }}
                                        </h2>

                                        <p class="mt-1 text-sm text-slate-500">
                                            {{ $surplus_listing->business->business_name ?? 'No business listed' }}
                                        </p>
                                    </div>

                                    <span
                                        class="shrink-0 text-xs font-semibold px-2 py-1 rounded-full
                                                {{ $surplus_listing->status === 'available' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-700' }}">
                                        {{ ucfirst($surplus_listing->status) }}
                                    </span>
                                </div>

                                {{-- Description --}}
                                <p class="text-sm text-slate-600 mb-4 line-clamp-3">
                                    {{ $surplus_listing->description }}
                                </p>

                                {{-- Prices --}}
                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <p class="text-xs text-slate-500">Original</p>
                                        <p class="text-sm line-through text-slate-400">
                                            €{{ number_format($surplus_listing->original_price, 2) }}
                                        </p>
                                    </div>

                                    <div class="text-right">
                                        <p class="text-xs text-slate-500">Now</p>
                                        <p class="text-lg font-bold text-indigo-600">
                                            €{{ number_format($surplus_listing->discounted_price, 2) }}
                                        </p>
                                    </div>
                                </div>

                                {{-- Pickup --}}
                                <div class="text-xs text-slate-500 mb-4">
                                    <p class="font-semibold text-slate-600">Pickup</p>
                                    <p>{{ $surplus_listing->pickup_start }} → {{ $surplus_listing->pickup_end }}</p>
                                </div>

                                {{-- Footer --}}
                                <div class="mt-auto flex justify-between items-center pt-4 border-t border-slate-100">
                                    <span class="text-sm font-semibold text-emerald-600">
                                        Save
                                        €{{ number_format($surplus_listing->original_price - $surplus_listing->discounted_price, 2) }}
                                    </span>

                                    <a href="{{ route('surplus-listing.show', $surplus_listing->id) }}"
                                        class="inline-flex items-center rounded-xl bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 transition">
                                        View
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>