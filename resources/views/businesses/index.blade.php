<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center px-4">
        <div class="w-full max-w-4xl">
            <div class="mb-10 mt-10">
                <h1 class="text-3xl sm:text-4xl font-bold text-slate-900">Businesses</h1>
                <p class="mt-2 text-slate-600">Browse available businesses and their details.</p>
            </div>
            @foreach ($businesses as $business)
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-7">

                    {{-- IMAGE AT TOP --}}
                    @if($business->image)
                        <img src="{{ asset('images/businesses/' . $business->image) }}" class="w-full h-64 object-cover">
                    @else
                        <div class="w-full h-64 bg-gray-300 flex items-center justify-center text-gray-500">
                            No Image
                        </div>
                    @endif

                    {{-- CONTENT BELOW --}}
                    <div class="p-8 flex flex-col gap-4">
                        <h1 class="text-3xl font-extrabold text-gray-800">
                            {{ $business->business_name }}
                        </h1>

                        <p class="text-gray-600"><strong>Type:</strong> {{ $business->business_type }}</p>
                        <p class="text-gray-600"><strong>Address:</strong> {{ $business->address }}</p>
                        <p class="text-gray-600"><strong>City:</strong> {{ $business->city }}</p>
                        <p class="text-gray-600"><strong>Eircode:</strong> {{ $business->eircode }}</p>
                        <p class="text-gray-600"><strong>Description:</strong> {{ $business->description }}</p>
                        <p class="text-gray-600"><strong>Opening Hours:</strong> {{ $business->opening_hours }}</p>
                    </div>

                    <div class="ml-10 mb-5 mr-10 flex justify-end">
                        <a href="{{ route('business.show', $business->id) }}"
                            class="bg-indigo-600 text-white text-sm px-3 py-1.5 rounded-lg hover:bg-indigo-700">
                            View
                        </a>
                    </div>


                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>