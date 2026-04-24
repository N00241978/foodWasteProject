<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 leading-tight">
                {{ __('Edit Business') }}
            </h2>
            <p class="mt-1 text-sm text-slate-600">
                Update the details for this business.
            </p>
        </div>
    </x-slot>

    <div class="min-h-screen bg-slate-50 py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="mb-6">
                <a href="{{ route('business.index') }}"
                    class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-700 transition">
                    ← Back to Businesses
                </a>
            </div>

            <div class="bg-white overflow-hidden border border-slate-200 shadow-sm rounded-2xl">
                <div class="p-6 sm:p-8 lg:p-10">
                    <div class="flex items-center gap-4 mb-8">
                        <div
                            class="w-14 h-14 rounded-2xl bg-indigo-100 text-indigo-700 flex items-center justify-center text-xl font-bold shadow-sm">
                            {{ strtoupper(substr($business->title, 0, 1)) }}
                        </div>

                        <div>
                            <h3 class="text-2xl font-bold text-slate-900">
                                Edit Business
                            </h3>
                            <p class="mt-1 text-sm text-slate-600">
                                {{ $business->title }}
                            </p>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-6">
                        <x-business-form :action="route('business.update', $business)"
                            :method="'PUT'" :business="$business" :businesses="$businesses" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>