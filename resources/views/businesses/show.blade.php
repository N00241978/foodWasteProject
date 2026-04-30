<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-emerald-50 via-lime-50 to-amber-50 py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">

            <div class="mb-6">
                <a href="{{ route('business.index') }}"
                    class="inline-flex items-center text-sm font-bold text-emerald-700 hover:text-emerald-900">
                    ← Back to local businesses
                </a>
            </div>

            <div class="bg-white border border-emerald-100 rounded-3xl shadow-sm overflow-hidden">

                @if($business->image)
                    <img src="{{ asset('images/businesses/' . $business->image) }}"
                        alt="{{ $business->business_name }}"
                        class="w-full h-80 object-cover">
                @else
                    <div class="w-full h-80 bg-emerald-100 flex items-center justify-center text-emerald-700 text-lg font-medium">
                        No Image Available
                    </div>
                @endif

                <div class="p-6 sm:p-8 lg:p-10">

                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6 mb-8">
                        <div>
                            <span class="inline-flex items-center rounded-full bg-lime-200 px-4 py-1 text-sm font-bold text-emerald-900">
                                🏪 Local food partner
                            </span>

                            <h1 class="mt-4 text-3xl sm:text-4xl font-extrabold text-emerald-950">
                                {{ $business->business_name }}
                            </h1>

                            <p class="mt-3 text-slate-600 leading-relaxed max-w-2xl">
                                {{ $business->description }}
                            </p>
                        </div>

                        <span class="inline-flex items-center rounded-full bg-emerald-100 text-emerald-800 px-4 py-1 text-sm font-bold">
                            {{ $business->business_type }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                        <div class="rounded-2xl bg-emerald-50 border border-emerald-100 p-5">
                            <p class="text-sm text-emerald-700">Business Type</p>
                            <p class="mt-1 text-lg font-bold text-emerald-950">
                                {{ $business->business_type }}
                            </p>
                        </div>

                        <div class="rounded-2xl bg-emerald-50 border border-emerald-100 p-5">
                            <p class="text-sm text-emerald-700">Email</p>
                            <p class="mt-1 text-lg font-bold text-emerald-950 break-words">
                                {{ $business->email }}
                            </p>
                        </div>

                        <div class="rounded-2xl bg-emerald-50 border border-emerald-100 p-5">
                            <p class="text-sm text-emerald-700">Opening Hours</p>
                            <p class="mt-1 text-lg font-bold text-emerald-950">
                                {{ $business->opening_hours }}
                            </p>
                        </div>

                        <div class="rounded-2xl bg-emerald-50 border border-emerald-100 p-5">
                            <p class="text-sm text-emerald-700">Address</p>
                            <p class="mt-1 text-base font-bold text-emerald-950">
                                {{ $business->address }}
                            </p>
                        </div>

                        <div class="rounded-2xl bg-emerald-50 border border-emerald-100 p-5">
                            <p class="text-sm text-emerald-700">City</p>
                            <p class="mt-1 text-base font-bold text-emerald-950">
                                {{ $business->city }}
                            </p>
                        </div>

                        <div class="rounded-2xl bg-emerald-50 border border-emerald-100 p-5">
                            <p class="text-sm text-emerald-700">Eircode</p>
                            <p class="mt-1 text-base font-bold text-emerald-950">
                                {{ $business->eircode }}
                            </p>
                        </div>
                    </div>

                    <div class="rounded-3xl bg-amber-50 border border-amber-100 p-5 mb-8">
                        <h2 class="text-lg font-bold text-emerald-950">
                            Why this business is featured
                        </h2>
                        <p class="mt-2 text-sm text-slate-600">
                            This business helps reduce food waste by making surplus food available at discounted prices instead of throwing it away.
                        </p>
                    </div>

                    <div class="border-t border-emerald-100 pt-8 mb-8">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h2 class="text-2xl font-extrabold text-emerald-950">
                                    Surplus food from this business
                                </h2>
                                <p class="mt-1 text-sm text-emerald-700">
                                    Items currently available from {{ $business->business_name }}.
                                </p>
                            </div>
                        </div>

                        @if($business->surplusListings->count())
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                @foreach($business->surplusListings as $listing)
                                    <div class="rounded-3xl border border-emerald-100 bg-white overflow-hidden shadow-sm hover:shadow-md transition">

                                        @if($listing->image)
                                            <img src="{{ asset('images/surplus-listings/' . $listing->image) }}"
                                                alt="{{ $listing->title }}"
                                                class="w-full h-48 object-cover">
                                        @else
                                            <div class="w-full h-48 bg-emerald-100 flex items-center justify-center text-emerald-700">
                                                No Image Available
                                            </div>
                                        @endif

                                        <div class="p-5">
                                            <h3 class="text-xl font-extrabold text-emerald-950">
                                                {{ $listing->title }}
                                            </h3>

                                            <p class="mt-2 text-sm text-slate-600 line-clamp-2">
                                                {{ $listing->description }}
                                            </p>

                                            <div class="mt-4 rounded-2xl bg-emerald-50 border border-emerald-100 p-4 flex justify-between items-center">
                                                <div>
                                                    <p class="text-xs text-emerald-700">Quantity</p>
                                                    <p class="text-lg font-bold text-emerald-950">
                                                        {{ $listing->quantity_available }}
                                                    </p>
                                                </div>

                                                <div class="text-right">
                                                    <p class="text-xs text-emerald-700">Rescue price</p>
                                                    <p class="text-lg font-extrabold text-emerald-700">
                                                        €{{ number_format($listing->discounted_price, 2) }}
                                                    </p>
                                                </div>
                                            </div>

                                            <a href="{{ route('surplus-listing.show', $listing) }}"
                                                class="mt-5 inline-flex items-center rounded-xl bg-amber-400 px-4 py-2 text-sm font-bold text-emerald-950 hover:bg-amber-300 transition">
                                                Rescue item
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="rounded-2xl border border-dashed border-emerald-200 bg-emerald-50 p-6 text-center">
                                <div class="text-3xl mb-2">🥕</div>
                                <p class="font-bold text-emerald-950">
                                    No surplus food listed yet
                                </p>
                                <p class="mt-1 text-sm text-emerald-700">
                                    Check back soon for new food rescue opportunities from this business.
                                </p>
                            </div>
                        @endif
                    </div>

                    <div class="border-t border-emerald-100 pt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <p class="text-sm text-emerald-700">Business ID</p>
                            <p class="text-base font-bold text-emerald-950">
                                {{ $business->id }}
                            </p>
                        </div>

                        <div class="flex gap-3">
                            <a href="{{ route('business.index') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-emerald-200 bg-white px-5 py-2.5 text-sm font-bold text-emerald-800 hover:bg-emerald-50 transition">
                                Back
                            </a>

                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('business.edit', $business) }}"
                                        class="inline-flex items-center rounded-xl bg-emerald-700 px-4 py-2 text-sm font-bold text-white hover:bg-emerald-800 transition">
                                        Edit Business
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>