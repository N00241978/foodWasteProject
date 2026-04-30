<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-emerald-50 via-lime-50 to-amber-50 px-4 py-10">
        <div class="max-w-7xl mx-auto">

            <div class="mb-10">
                <span class="inline-flex items-center rounded-full bg-lime-200 px-4 py-1 text-sm font-bold text-emerald-900">
                    🏪 Local food partners
                </span>

                <h1 class="mt-4 text-3xl sm:text-4xl font-extrabold text-emerald-950">
                    Businesses helping reduce food waste
                </h1>

                <p class="mt-2 text-emerald-700">
                    Browse local cafés, bakeries, restaurants and shops offering surplus food at discounted prices.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($businesses as $business)
                    <div class="bg-white rounded-3xl shadow-sm border border-emerald-100 overflow-hidden flex flex-col hover:shadow-md transition">

                        @if($business->image)
                            <img src="{{ asset('images/businesses/' . $business->image) }}"
                                alt="{{ $business->business_name }}"
                                class="w-full h-56 object-cover">
                        @else
                            <div class="w-full h-56 bg-emerald-100 flex items-center justify-center text-emerald-700">
                                No Image
                            </div>
                        @endif

                        <div class="p-6 flex flex-col gap-3 flex-1">
                            <span class="text-xs font-bold uppercase tracking-wide text-lime-700">
                                Local Partner
                            </span>

                            <h2 class="text-2xl font-extrabold text-emerald-950">
                                {{ $business->business_name }}
                            </h2>

                            <p class="text-sm text-emerald-700 font-semibold">
                                {{ $business->business_type }}
                            </p>

                            <div class="space-y-2 text-sm text-slate-600">
                                <p>
                                    <strong class="text-emerald-900">Address:</strong>
                                    {{ $business->address }}, {{ $business->city }}
                                </p>

                                <p>
                                    <strong class="text-emerald-900">Eircode:</strong>
                                    {{ $business->eircode }}
                                </p>

                                <p class="line-clamp-3">
                                    {{ $business->description }}
                                </p>

                                <p>
                                    <strong class="text-emerald-900">Opening Hours:</strong>
                                    {{ $business->opening_hours }}
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6 flex justify-between items-center">
                            <span class="text-sm font-bold text-emerald-700">
                                🌱 Surplus seller
                            </span>

                            <a href="{{ route('business.show', $business->id) }}"
                                class="inline-flex items-center justify-center rounded-xl bg-emerald-700 px-4 py-2 text-sm font-bold text-white hover:bg-emerald-800 transition">
                                View business
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>