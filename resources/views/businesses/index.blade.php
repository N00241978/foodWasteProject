<x-app-layout>
    <div class="min-h-screen bg-gray-100 px-4 py-10">
        <div class="max-w-7xl mx-auto">

            <div class="mb-10 text-start">
                <h1 class="text-3xl sm:text-4xl font-bold text-slate-900">
                    Businesses
                </h1>
                <p class="mt-2 text-slate-600">
                    Browse available businesses and their details.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($businesses as $business)
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden flex flex-col">

                        {{-- IMAGE AT TOP --}}
                        @if($business->image)
                            <img src="{{ asset('images/businesses/' . $business->image) }}" alt="{{ $business->business_name }}"
                                class="w-full h-56 object-cover">
                        @else
                            <div class="w-full h-56 bg-gray-300 flex items-center justify-center text-gray-500">
                                No Image
                            </div>
                        @endif

                        {{-- CONTENT BELOW --}}
                        <div class="p-6 flex flex-col gap-3 flex-1">
                            <h2 class="text-2xl font-bold text-gray-800">
                                {{ $business->business_name }}
                            </h2>

                            <p class="text-sm text-gray-600">
                                <strong>Type:</strong> {{ $business->business_type }}
                            </p>

                            <p class="text-sm text-gray-600">
                                <strong>Address:</strong> {{ $business->address }}
                            </p>

                            <p class="text-sm text-gray-600">
                                <strong>City:</strong> {{ $business->city }}
                            </p>

                            <p class="text-sm text-gray-600">
                                <strong>Eircode:</strong> {{ $business->eircode }}
                            </p>

                            <p class="text-sm text-gray-600 line-clamp-3">
                                <strong>Description:</strong> {{ $business->description }}
                            </p>

                            <p class="text-sm text-gray-600">
                                <strong>Opening Hours:</strong> {{ $business->opening_hours }}
                            </p>
                        </div>

                        <div class="px-6 pb-6 flex justify-end">
                            <a href="{{ route('business.show', $business->id) }}"
                                class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 transition">
                                View
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>