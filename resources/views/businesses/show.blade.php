<x-app-layout>
    <div class="min-h-screen bg-slate-50 py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">

            <div class="mb-6">
                <a href="{{ route('business.index') }}"
                    class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-700">
                    ← Back to Businesses
                </a>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                {{-- IMAGE AT TOP --}}
                @if($business->image)
                    <img src="{{ asset('images/businesses/' . $business->image) }}" alt="{{ $business->business_name }}"
                        class="w-full h-72 object-cover">
                @else
                    <div
                        class="w-full h-72 bg-slate-200 flex items-center justify-center text-slate-500 text-lg font-medium">
                        No Image Available
                    </div>
                @endif

                <div class="p-6 sm:p-8 lg:p-10">

                    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6 mb-8">
                        <div>
                            <h1 class="text-3xl font-bold text-slate-900">
                                {{ $business->business_name }}
                            </h1>

                            <p class="mt-3 text-slate-600 leading-relaxed">
                                {{ $business->description }}
                            </p>
                        </div>

                        <div>
                            <span
                                class="inline-flex items-center rounded-full bg-indigo-100 text-indigo-700 px-3 py-1 text-sm font-semibold">
                                {{ $business->business_type }}
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Business Type</p>
                            <p class="mt-1 text-lg font-semibold text-slate-900">
                                {{ $business->business_type }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Email</p>
                            <p class="mt-1 text-lg font-semibold text-indigo-600">
                                {{ $business->email }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Opening Hours</p>
                            <p class="mt-1 text-lg font-semibold text-slate-900">
                                {{ $business->opening_hours }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Address</p>
                            <p class="mt-1 text-base font-medium text-slate-800">
                                {{ $business->address }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">City</p>
                            <p class="mt-1 text-base font-medium text-slate-800">
                                {{ $business->city }}
                            </p>
                        </div>

                        <div class="rounded-xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-sm text-slate-500">Eircode</p>
                            <p class="mt-1 text-base font-medium text-slate-800">
                                {{ $business->eircode }}
                            </p>
                        </div>
                    </div>

                    <div class="border-t border-slate-200 pt-8 mb-8">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h2 class="text-2xl font-bold text-slate-900">
                                    Surplus Listings
                                </h2>
                                <p class="mt-1 text-sm text-slate-500">
                                    Items currently available from {{ $business->business_name }}.
                                </p>
                            </div>
                        </div>

                        @if($business->surplusListings->count())
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                @foreach($business->surplusListings as $listing)
                                    <div class="rounded-2xl border border-slate-200 bg-slate-50 overflow-hidden">

                                        @if($listing->image)
                                            <img src="{{ asset('images/surplus-listings/' . $listing->image) }}"
                                                alt="{{ $listing->title }}" class="w-full h-48 object-cover">
                                        @else
                                            <div class="w-full h-48 bg-slate-200 flex items-center justify-center text-slate-500">
                                                No Image Available
                                            </div>
                                        @endif

                                        <div class="p-5">
                                            <h3 class="text-xl font-bold text-slate-900">
                                                {{ $listing->title }}
                                            </h3>

                                            <p class="mt-2 text-sm text-slate-600">
                                                {{ $listing->description }}
                                            </p>

                                            <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                                                <p class="text-slate-600">
                                                    <strong>Quantity:</strong> {{ $listing->quantity }}
                                                </p>

                                                <p class="text-slate-600">
                                                    <strong>Price:</strong> €{{ $listing->price }}
                                                </p>
                                            </div>

                                            <a href="{{ route('surplus-listing.show', $listing) }}"
                                                class="mt-5 inline-flex items-center rounded-xl bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 transition">
                                                View Listing
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="rounded-xl border border-dashed border-slate-300 bg-slate-50 p-6 text-center">
                                <p class="text-slate-500">
                                    This business has no surplus listings yet.
                                </p>
                            </div>
                        @endif
                    </div>

                    <div
                        class="border-t border-slate-200 pt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <p class="text-sm text-slate-500">Business ID</p>
                            <p class="text-base font-medium text-slate-800">
                                {{ $business->id }}
                            </p>
                        </div>

                        <div class="flex gap-3">
                            <a href="{{ route('business.index') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 transition">
                                Back
                            </a>

                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('business.edit', $business) }}"
                                        class="inline-flex items-center rounded-xl bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 transition">
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