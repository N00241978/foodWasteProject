@props([
    'action',
    'method' => 'POST',
    'business' => null,
])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    @if($method !== 'POST')
        @method($method)
    @endif

    <div>
        <label for="business_name" class="block text-sm font-bold text-emerald-900 mb-2">
            Business Name
        </label>
        <input type="text" name="business_name" id="business_name"
            value="{{ old('business_name', $business->business_name ?? '') }}"
            class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
            placeholder="e.g. Daily Loaf Bakery">

        @error('business_name')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="business_type" class="block text-sm font-bold text-emerald-900 mb-2">
            Business Type
        </label>
        <input type="text" name="business_type" id="business_type"
            value="{{ old('business_type', $business->business_type ?? '') }}"
            class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
            placeholder="e.g. Bakery, Café, Grocery Shop">

        @error('business_type')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="address" class="block text-sm font-bold text-emerald-900 mb-2">
            Address
        </label>
        <input type="text" name="address" id="address"
            value="{{ old('address', $business->address ?? '') }}"
            class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">

        @error('address')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="city" class="block text-sm font-bold text-emerald-900 mb-2">
                City
            </label>
            <input type="text" name="city" id="city"
                value="{{ old('city', $business->city ?? '') }}"
                class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">

            @error('city')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="eircode" class="block text-sm font-bold text-emerald-900 mb-2">
                Eircode
            </label>
            <input type="text" name="eircode" id="eircode"
                value="{{ old('eircode', $business->eircode ?? '') }}"
                class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">

            @error('eircode')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div>
        <label for="email" class="block text-sm font-bold text-emerald-900 mb-2">
            Email
        </label>
        <input type="email" name="email" id="email"
            value="{{ old('email', $business->email ?? '') }}"
            class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">

        @error('email')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="opening_hours" class="block text-sm font-bold text-emerald-900 mb-2">
            Opening Hours
        </label>
        <input type="text" name="opening_hours" id="opening_hours"
            value="{{ old('opening_hours', $business->opening_hours ?? '') }}"
            class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
            placeholder="e.g. Mon-Fri 9am-5pm">

        @error('opening_hours')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block text-sm font-bold text-emerald-900 mb-2">
            Sustainability Description
        </label>
        <textarea name="description" id="description" rows="4"
            class="w-full rounded-xl border-emerald-200 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
            placeholder="Describe the business and how it helps reduce surplus food waste">{{ old('description', $business->description ?? '') }}</textarea>

        @error('description')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="image" class="block text-sm font-bold text-emerald-900 mb-2">
            Business Image
        </label>

        <input type="file" name="image" id="image"
            class="w-full rounded-xl border border-emerald-200 bg-white px-3 py-2 shadow-sm file:mr-4 file:rounded-lg file:border-0 file:bg-lime-200 file:px-4 file:py-2 file:text-sm file:font-bold file:text-emerald-950 hover:file:bg-lime-300">

        @error('image')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="rounded-2xl bg-amber-50 border border-amber-100 p-4">
        <p class="text-sm font-bold text-emerald-950">🌱 Business tip</p>
        <p class="mt-1 text-sm text-slate-600">
            A clear business image, opening hours and description help users trust where their rescued food is coming from.
        </p>
    </div>

    <div class="flex items-center justify-end gap-3 pt-4 border-t border-emerald-100">
        <a href="{{ route('business.index') }}"
            class="inline-flex items-center justify-center rounded-xl border border-emerald-200 bg-white px-5 py-2.5 text-sm font-bold text-emerald-800 hover:bg-emerald-50 transition">
            Cancel
        </a>

        <button type="submit"
            class="inline-flex items-center justify-center rounded-xl bg-emerald-700 px-5 py-2.5 text-sm font-bold text-white hover:bg-emerald-800 transition">
            {{ $method === 'PUT' ? 'Update Business' : 'Create Business' }}
        </button>
    </div>
</form>