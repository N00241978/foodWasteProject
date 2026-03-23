@php
    // dd($businesses);
@endphp

<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center px-4">


        <div class="flex-1">


            @foreach ($businesses as $business)
                <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden mb-7">
                    <div class="md:flex items-start p-10 space-y-6 md:space-y-0 md:space-x-10">

                        <div
                            class="w-40 h-40 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 text-4xl font-bold border-4 border-indigo-500 shadow-md">
                        </div>
                        <div class="flex flex-col gap-5 mt-5">
                            <h1 class="text-4xl font-extrabold text-gray-800">{{ $business->business_name }}</h1>
                            <p class="mt-2 text-lg text-gray-600"><strong>Business Name:</strong>
                                {{ $business->business_name }}</p>
                            <p class="mt-1 text-lg text-gray-600"><strong>Business Type:</strong>
                                {{ $business->business_type }}</p>
                            <p class="mt-1 text-lg text-gray-600"><strong>Address:</strong> {{ $business->address }}</p>
                            <p class="mt-1 text-lg text-gray-600"><strong>City:</strong> {{ $business->city }}</p>
                            <p class="mt-1 text-lg text-gray-600"><strong>Eircode:</strong> {{ $business->eircode }}</p>
                            <p class="mt-1 text-lg text-gray-600"><strong>Description:</strong> {{ $business->description }}
                            </p>
                            <p class="mt-1 text-lg text-gray-600"><strong>Opening Hours:</strong>
                                {{ $business->opening_hours }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>