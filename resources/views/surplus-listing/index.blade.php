<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-emerald-50 via-lime-50 to-amber-50 py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-10">
                <div>
                    <span class="inline-flex items-center rounded-full bg-lime-200 px-4 py-1 text-sm font-bold text-emerald-900">
                        🌱 Fresh surplus food
                    </span>

                    <h1 class="mt-4 text-3xl sm:text-4xl font-extrabold text-emerald-950">
                        Rescue food near you
                    </h1>

                    <p class="mt-2 text-emerald-700">
                        Browse discounted surplus meals, groceries and baked goods before they go to waste.
                    </p>
                </div>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('surplus-listing.create') }}"
                            class="inline-flex items-center rounded-xl bg-emerald-700 px-5 py-2.5 text-sm font-bold text-white hover:bg-emerald-800 transition">
                            Create New Listing
                        </a>
                    @endif
                @endauth
            </div>

            @if ($surplus_listings->isEmpty())
                <div class="bg-white border border-emerald-100 rounded-3xl shadow-sm p-10 text-center">
                    <div class="text-4xl mb-3">🥕</div>
                    <h2 class="text-xl font-bold text-emerald-950">No surplus food available</h2>
                    <p class="mt-2 text-emerald-700">
                        Check back soon for new food rescue opportunities.
                    </p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($surplus_listings as $surplus_listing)
                        <div class="bg-white border border-emerald-100 rounded-3xl shadow-sm hover:shadow-md transition overflow-hidden flex flex-col">

                            @if($surplus_listing->image)
                                <img src="{{ asset('images/surplus-listings/' . $surplus_listing->image) }}"
                                    alt="{{ $surplus_listing->title }}" class="w-full h-56 object-cover">
                            @else
                                <div class="w-full h-56 bg-emerald-100 flex items-center justify-center text-emerald-700">
                                    No Image
                                </div>
                            @endif

                            <div class="p-5 flex flex-col flex-1">

                                <div class="flex items-start justify-between gap-4 mb-4">
                                    <div>
                                        <h2 class="text-xl font-bold text-emerald-950 leading-tight">
                                            {{ $surplus_listing->title }}
                                        </h2>

                                        <p class="mt-1 text-sm font-medium text-emerald-700">
                                            {{ $surplus_listing->business->business_name ?? 'No business listed' }}
                                        </p>
                                    </div>

                                    <span class="shrink-0 text-xs font-bold px-3 py-1 rounded-full
                                        {{ $surplus_listing->status === 'available'
                                            ? 'bg-lime-200 text-emerald-900'
                                            : 'bg-slate-100 text-slate-600' }}">
                                        {{ ucfirst($surplus_listing->status) }}
                                    </span>
                                </div>

                                <p class="text-sm text-slate-600 mb-4 line-clamp-3">
                                    {{ $surplus_listing->description }}
                                </p>

                                <div class="rounded-2xl bg-emerald-50 border border-emerald-100 p-4 mb-4">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-xs text-slate-500">Original price</p>
                                            <p class="text-sm line-through text-slate-400">
                                                €{{ number_format($surplus_listing->original_price, 2) }}
                                            </p>
                                        </div>

                                        <div class="text-right">
                                            <p class="text-xs text-emerald-700">Rescue price</p>
                                            <p class="text-2xl font-extrabold text-emerald-700">
                                                €{{ number_format($surplus_listing->discounted_price, 2) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs text-slate-600 mb-4">
                                    <p class="font-bold text-emerald-900">Pickup window</p>
                                    <p>{{ $surplus_listing->pickup_start }} → {{ $surplus_listing->pickup_end }}</p>
                                </div>

                                <div class="mt-auto flex justify-between items-center pt-4 border-t border-emerald-100">
                                    <span class="text-sm font-bold text-emerald-700">
                                        Save €{{ number_format($surplus_listing->original_price - $surplus_listing->discounted_price, 2) }}
                                    </span>

                                    <a href="{{ route('surplus-listing.show', $surplus_listing->id) }}"
                                        class="inline-flex items-center rounded-xl bg-amber-400 px-4 py-2 text-sm font-bold text-emerald-950 hover:bg-amber-300 transition">
                                        Rescue item
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