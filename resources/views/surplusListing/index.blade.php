@php
    // dd($surplusListings);
@endphp

<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center px-4">


        <div class="flex-1">


            @foreach ($surplusListings as $surplusListing)
                <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden mb-7">
                    <div class="md:flex items-start p-10 space-y-6 md:space-y-0 md:space-x-10">

                        <div
                            class="w-40 h-40 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 text-4xl font-bold border-4 border-indigo-500 shadow-md">
                        </div>
                        <div class="flex flex-col gap-5 mt-5">
                            <h1 class="text-4xl font-extrabold text-gray-800">{{ $surplusListing->title }}</h1>
                            <p class="mt-2 text-lg text-gray-600"><strong>Title:</strong>
                                {{ $surplusListing->title }}</p>
                            <p class="mt-1 text-lg text-gray-600"><strong>Description:</strong>
                                {{ $surplusListing->description }}</p>
                            <p class="mt-1 text-lg text-gray-600"><strong>Original Price:</strong>
                                {{ $surplusListing->original_price }}</p>
                            <p class="mt-1 text-lg text-gray-600"><strong>Discounted Price:</strong>
                                {{ $surplusListing->discounted_price }}</p>
                            <p class="mt-1 text-lg text-gray-600"><strong>Quantity Available:</strong>
                                {{ $surplusListing->quantity_available }}</p>
                            <p class="mt-1 text-lg text-gray-600"><strong>Pickup Start:</strong>
                                {{ $surplusListing->pickup_start }}</p>
                            <p class="mt-1 text-lg text-gray-600"><strong>Pickup End:</strong>
                                {{ $surplusListing->pickup_end }}</p>
                            <p class="mt-1 text-lg text-gray-600"><strong>Status:</strong> {{ $surplusListing->status }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>