<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- Welcome --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-slate-200">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold text-slate-900">
                        Welcome back!
                    </h1>
                    <p class="mt-2 text-slate-600">
                        Browse the top shops selling yuor favourite food at a discounted price, while helping to reduce food waste!.
                    </p>
                </div>
            </div>
            {{-- Prototype Map --}}
            <div>
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900">
                            Local Shops with listings
                        </h2>
                        <p class="text-sm text-slate-600">
                            Use our map to find discounted food nearby!
                        </p>
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <div id="map" class="w-full h-[450px]"></div>
                </div>
            </div>

            {{-- Leaflet CSS --}}
            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

            {{-- Leaflet JS --}}
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const map = L.map('map').setView([53.3498, -6.2603], 13);

                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; OpenStreetMap contributors'
                    }).addTo(map);

                    const spots = [
                        {
                            name: 'Fresh Basket Café',
                            description: 'Surplus sandwiches and pastries available.',
                            lat: 53.3498,
                            lng: -6.2603
                        },
                        {
                            name: 'Green Corner Market',
                            description: 'Discounted fruit and veg pickup spot.',
                            lat: 53.3440,
                            lng: -6.2672
                        },
                        {
                            name: 'Daily Loaf Bakery',
                            description: 'End-of-day bread and baked goods.',
                            lat: 53.3535,
                            lng: -6.2480
                        },
                        {
                            name: 'Urban Eats',
                            description: 'Prepared meals available for collection.',
                            lat: 53.3471,
                            lng: -6.2550
                        }
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
                        <h2 class="text-2xl font-bold text-slate-900">
                            Featured Businesses 
                        </h2>
                        <p class="text-sm text-slate-600">
                            A quick look at local businesses with discounted lsitings.
                        </p>
                    </div>

                    <a href="{{ route('business.index') }}"
                        class="text-sm font-medium text-indigo-600 hover:text-indigo-700">
                        View all
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($businesses->take(3) as $business)
                        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">
                            @if($business->image)
                                <img src="{{ asset('images/businesses/' . $business->image) }}"
                                    alt="{{ $business->business_name }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-slate-200 flex items-center justify-center text-slate-500">
                                    No Image
                                </div>
                            @endif

                            <div class="p-5 flex flex-col flex-1">
                                <h3 class="text-xl font-bold text-slate-900">
                                    {{ $business->business_name }}
                                </h3>

                                <p class="mt-2 text-sm text-slate-600">
                                    {{ $business->business_type }}
                                </p>

                                <p class="mt-2 text-sm text-slate-500 line-clamp-2">
                                    {{ $business->description }}
                                </p>

                                <div class="mt-auto pt-4">
                                    <a href="{{ route('business.show', $business->id) }}"
                                        class="inline-flex items-center rounded-xl bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 transition">
                                        View
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
                        <h2 class="text-2xl font-bold text-slate-900">
                            Latest Surplus Listings
                        </h2>
                        <p class="text-sm text-slate-600">
                            Recently added surplus items.
                        </p>
                    </div>

                    <a href="{{ route('surplus-listing.index') }}"
                        class="text-sm font-medium text-indigo-600 hover:text-indigo-700">
                        View all
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($surplus_listings->take(6) as $surplus_listing)
                        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">
                            @if($surplus_listing->image)
                                <img src="{{ asset('images/surplus-listings/' . $surplus_listing->image) }}"
                                    alt="{{ $surplus_listing->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-slate-200 flex items-center justify-center text-slate-500">
                                    No Image
                                </div>
                            @endif

                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-start justify-between gap-3">
                                    <h3 class="text-lg font-bold text-slate-900">
                                        {{ $surplus_listing->title }}
                                    </h3>

                                    <span
                                        class="text-xs font-semibold px-2 py-1 rounded-full
                                                    {{ $surplus_listing->status === 'available' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-700' }}">
                                        {{ ucfirst($surplus_listing->status) }}
                                    </span>
                                </div>

                                <p class="mt-2 text-sm text-slate-600 line-clamp-2">
                                    {{ $surplus_listing->description }}
                                </p>

                                <div class="mt-4 flex justify-between items-center">
                                    <div>
                                        <p class="text-xs text-slate-500">Now</p>
                                        <p class="text-lg font-bold text-indigo-600">
                                            €{{ number_format($surplus_listing->discounted_price, 2) }}
                                        </p>
                                    </div>

                                    <a href="{{ route('surplus-listing.show', $surplus_listing->id) }}"
                                        class="inline-flex items-center rounded-xl bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 transition">
                                        View
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