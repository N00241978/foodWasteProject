<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-bold text-2xl text-emerald-900">
                FoodSaver Dashboard
            </h2>
            <p class="text-sm text-emerald-700">
                Save food, save money, support local businesses.
            </p>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-emerald-50 via-lime-50 to-amber-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">

            {{-- Hero / Welcome --}}
            <div class="relative overflow-hidden rounded-3xl bg-emerald-900 shadow-lg">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-900 via-emerald-800 to-lime-700 opacity-95"></div>

                <div class="relative p-8 md:p-10 text-white">
                    <span class="inline-flex items-center rounded-full bg-lime-200 px-4 py-1 text-sm font-semibold text-emerald-900">
                        🌱 Reducing food waste together
                    </span>

                    <h1 class="mt-5 text-3xl md:text-5xl font-extrabold leading-tight">
                        Rescue surplus food from local businesses
                    </h1>

                    <p class="mt-4 max-w-2xl text-emerald-50 text-lg">
                        Find discounted meals, baked goods, groceries and prepared food near you before they go to waste.
                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('surplus-listing.index') }}"
                            class="inline-flex items-center rounded-xl bg-lime-300 px-5 py-3 text-sm font-bold text-emerald-950 hover:bg-lime-200 transition">
                            Browse surplus food
                        </a>

                        <a href="{{ route('business.index') }}"
                            class="inline-flex items-center rounded-xl border border-white/40 px-5 py-3 text-sm font-bold text-white hover:bg-white/10 transition">
                            View local businesses
                        </a>
                    </div>
                </div>
            </div>

            {{-- Impact Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="rounded-2xl bg-white border border-emerald-100 p-6 shadow-sm">
                    <div class="text-3xl">🥪</div>
                    <h3 class="mt-3 text-lg font-bold text-emerald-900">Rescue food</h3>
                    <p class="mt-2 text-sm text-emerald-700">
                        Buy surplus food before it is thrown away.
                    </p>
                </div>

                <div class="rounded-2xl bg-white border border-emerald-100 p-6 shadow-sm">
                    <div class="text-3xl">💶</div>
                    <h3 class="mt-3 text-lg font-bold text-emerald-900">Save money</h3>
                    <p class="mt-2 text-sm text-emerald-700">
                        Get quality food at reduced prices.
                    </p>
                </div>

                <div class="rounded-2xl bg-white border border-emerald-100 p-6 shadow-sm">
                    <div class="text-3xl">🏪</div>
                    <h3 class="mt-3 text-lg font-bold text-emerald-900">Support local</h3>
                    <p class="mt-2 text-sm text-emerald-700">
                        Help nearby cafés, bakeries and shops reduce waste.
                    </p>
                </div>
            </div>

            {{-- Map --}}
            <div>
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h2 class="text-2xl font-bold text-emerald-950">
                            Find surplus food nearby
                        </h2>
                        <p class="text-sm text-emerald-700">
                            Explore local pickup spots helping reduce food waste.
                        </p>
                    </div>
                </div>

                <div class="bg-white border border-emerald-100 rounded-3xl shadow-sm overflow-hidden p-3">
                    <div id="map" class="w-full h-[450px] rounded-2xl"></div>
                </div>
            </div>

            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const map = L.map('map').setView([53.3498, -6.2603], 13);

                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; OpenStreetMap contributors'
                    }).addTo(map);

                    const spots = [
                        { name: 'Fresh Basket Café', description: 'Surplus sandwiches and pastries available.', lat: 53.3498, lng: -6.2603 },
                        { name: 'Green Corner Market', description: 'Discounted fruit and veg pickup spot.', lat: 53.3440, lng: -6.2672 },
                        { name: 'Daily Loaf Bakery', description: 'End-of-day bread and baked goods.', lat: 53.3535, lng: -6.2480 },
                        { name: 'Urban Eats', description: 'Prepared meals available for collection.', lat: 53.3471, lng: -6.2550 }
                    ];

                    spots.forEach(spot => {
                        L.marker([spot.lat, spot.lng])
                            .addTo(map)
                            .bindPopup(`
                                <strong>${spot.name}</strong><br>
                                ${spot.description}
                            `);
                    });
                });
            </script>

            {{-- Businesses --}}
            <div>
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h2 class="text-2xl font-bold text-emerald-950">
                            Local businesses making a difference
                        </h2>
                        <p class="text-sm text-emerald-700">
                            Shops, cafés and bakeries offering surplus food at lower prices.
                        </p>
                    </div>

                    <a href="{{ route('business.index') }}"
                        class="text-sm font-bold text-emerald-700 hover:text-emerald-900">
                        View all
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($businesses->take(3) as $business)
                        <div class="bg-white border border-emerald-100 rounded-3xl shadow-sm overflow-hidden flex flex-col hover:shadow-md transition">
                            @if($business->image)
                                <img src="{{ asset('images/businesses/' . $business->image) }}"
                                    alt="{{ $business->business_name }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-emerald-100 flex items-center justify-center text-emerald-700">
                                    No Image
                                </div>
                            @endif

                            <div class="p-5 flex flex-col flex-1">
                                <span class="text-xs font-bold uppercase tracking-wide text-lime-700">
                                    Local Partner
                                </span>

                                <h3 class="mt-1 text-xl font-bold text-emerald-950">
                                    {{ $business->business_name }}
                                </h3>

                                <p class="mt-2 text-sm font-medium text-emerald-700">
                                    {{ $business->business_type }}
                                </p>

                                <p class="mt-2 text-sm text-slate-600 line-clamp-2">
                                    {{ $business->description }}
                                </p>

                                <div class="mt-auto pt-4">
                                    <a href="{{ route('business.show', $business->id) }}"
                                        class="inline-flex items-center rounded-xl bg-emerald-700 px-4 py-2 text-sm font-bold text-white hover:bg-emerald-800 transition">
                                        Visit business
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Surplus Listings --}}
            <div>
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h2 class="text-2xl font-bold text-emerald-950">
                            Fresh surplus available now
                        </h2>
                        <p class="text-sm text-emerald-700">
                            Recently added food waiting to be rescued.
                        </p>
                    </div>

                    <a href="{{ route('surplus-listing.index') }}"
                        class="text-sm font-bold text-emerald-700 hover:text-emerald-900">
                        View all
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($surplus_listings->take(6) as $surplus_listing)
                        <div class="bg-white border border-emerald-100 rounded-3xl shadow-sm overflow-hidden flex flex-col hover:shadow-md transition">
                            @if($surplus_listing->image)
                                <img src="{{ asset('images/surplus-listings/' . $surplus_listing->image) }}"
                                    alt="{{ $surplus_listing->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-emerald-100 flex items-center justify-center text-emerald-700">
                                    No Image
                                </div>
                            @endif

                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-start justify-between gap-3">
                                    <h3 class="text-lg font-bold text-emerald-950">
                                        {{ $surplus_listing->title }}
                                    </h3>

                                    <span class="text-xs font-bold px-3 py-1 rounded-full
                                        {{ $surplus_listing->status === 'available'
                                            ? 'bg-lime-200 text-emerald-900'
                                            : 'bg-slate-100 text-slate-600' }}">
                                        {{ ucfirst($surplus_listing->status) }}
                                    </span>
                                </div>

                                <p class="mt-2 text-sm text-slate-600 line-clamp-2">
                                    {{ $surplus_listing->description }}
                                </p>

                                <div class="mt-4 flex justify-between items-end">
                                    <div>
                                        <p class="text-xs text-slate-500">Rescue price</p>
                                        <p class="text-2xl font-extrabold text-emerald-700">
                                            €{{ number_format($surplus_listing->discounted_price, 2) }}
                                        </p>
                                    </div>

                                    <a href="{{ route('surplus-listing.show', $surplus_listing->id) }}"
                                        class="inline-flex items-center rounded-xl bg-amber-400 px-4 py-2 text-sm font-bold text-emerald-950 hover:bg-amber-300 transition">
                                        Rescue item
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>