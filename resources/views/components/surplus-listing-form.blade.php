@props([
    'action',
    'method' => 'POST',
    'surplus_listing' => null,
    'businesses' => []
])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <div>
        <label for="title" class="block text-sm font-bold text-emerald-900 mb-2">
            Food title
        </label>
        <input type="text" name="title" id="title"
            value="{{ old('title', $surplus_listing->title ?? '') }}"
            class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
            placeholder="e.g. Mixed bakery bag">

        @error('title')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block text-sm font-bold text-emerald-900 mb-2">
            Description
        </label>
        <textarea name="description" id="description" rows="4"
            class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
            placeholder="Describe what food is included and why it is surplus">{{ old('description', $surplus_listing->description ?? '') }}</textarea>

        @error('description')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="original_price" class="block text-sm font-bold text-emerald-900 mb-2">
                Original Price (€)
            </label>
            <input type="number" step="0.01" name="original_price" id="original_price"
                value="{{ old('original_price', $surplus_listing->original_price ?? '') }}"
                class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">

            @error('original_price')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="discounted_price" class="block text-sm font-bold text-emerald-900 mb-2">
                Rescue Price (€)
            </label>
            <input type="number" step="0.01" name="discounted_price" id="discounted_price"
                value="{{ old('discounted_price', $surplus_listing->discounted_price ?? '') }}"
                class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">

            @error('discounted_price')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="quantity_available" class="block text-sm font-bold text-emerald-900 mb-2">
                Quantity Available
            </label>
            <input type="number" name="quantity_available" id="quantity_available"
                value="{{ old('quantity_available', $surplus_listing->quantity_available ?? '') }}"
                class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">

            @error('quantity_available')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="status" class="block text-sm font-bold text-emerald-900 mb-2">
                Status
            </label>
            <select name="status" id="status"
                class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                <option value="">Select status</option>
                <option value="available" {{ old('status', $surplus_listing->status ?? '') == 'available' ? 'selected' : '' }}>
                    Available
                </option>
                <option value="unavailable" {{ old('status', $surplus_listing->status ?? '') == 'unavailable' ? 'selected' : '' }}>
                    Unavailable
                </option>
            </select>

            @error('status')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="business_id" class="block text-sm font-bold text-emerald-900 mb-2">
                Business
            </label>

            <select name="business_id" id="business_id"
                class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                <option value="">Select business</option>

                @foreach ($businesses as $business)
                    <option value="{{ $business->id }}"
                        {{ old('business_id', $surplus_listing->business_id ?? '') == $business->id ? 'selected' : '' }}>
                        {{ $business->business_name }}
                    </option>
                @endforeach
            </select>

            @error('business_id')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image" class="block text-sm font-bold text-emerald-900 mb-2">
                Food image
            </label>

            <input type="file" name="image" id="image"
                class="w-full rounded-xl border border-emerald-200 bg-white px-3 py-2 shadow-sm file:mr-4 file:rounded-lg file:border-0 file:bg-lime-200 file:px-4 file:py-2 file:text-sm file:font-bold file:text-emerald-950 hover:file:bg-lime-300">

            @error('image')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="pickup_start" class="block text-sm font-bold text-emerald-900 mb-2">
                Pickup Start
            </label>
            <input type="datetime-local" name="pickup_start" id="pickup_start"
                value="{{ old('pickup_start', isset($surplus_listing->pickup_start) ? \Carbon\Carbon::parse($surplus_listing->pickup_start)->format('Y-m-d\TH:i') : '') }}"
                class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">

            @error('pickup_start')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="pickup_end" class="block text-sm font-bold text-emerald-900 mb-2">
                Pickup End
            </label>
            <input type="datetime-local" name="pickup_end" id="pickup_end"
                value="{{ old('pickup_end', isset($surplus_listing->pickup_end) ? \Carbon\Carbon::parse($surplus_listing->pickup_end)->format('Y-m-d\TH:i') : '') }}"
                class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">

            @error('pickup_end')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="rounded-2xl bg-amber-50 border border-amber-100 p-4">
        <p class="text-sm font-bold text-emerald-950">🌱 Listing tip</p>
        <p class="mt-1 text-sm text-slate-600">
            Clear pickup times, a good photo, and a fair rescue price make users more likely to reserve surplus food.
        </p>
    </div>

    <div class="flex items-center justify-end gap-3 pt-4 border-t border-emerald-100">
        <a href="{{ route('surplus-listing.index') }}"
            class="inline-flex items-center justify-center rounded-xl border border-emerald-200 bg-white px-5 py-2.5 text-sm font-bold text-emerald-800 hover:bg-emerald-50 transition">
            Cancel
        </a>

        <button type="submit"
            class="inline-flex items-center justify-center rounded-xl bg-emerald-700 px-5 py-2.5 text-sm font-bold text-white hover:bg-emerald-800 transition">
            {{ $method === 'PUT' ? 'Update Listing' : 'Create Listing' }}
        </button>
    </div>
</form>