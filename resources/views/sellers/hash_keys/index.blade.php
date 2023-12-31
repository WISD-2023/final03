<x-seller-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @section('page-title', '首頁')
            {{ __('訂單資訊加密') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="post" action="{{ route('sellers.hash_keys.store') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('post')

                        <div>
                            <x-input-label for="name" :value="__('藍新商店ID')" />
                            <x-text-input id="merchant" name="merchant" type="text" class="mt-1 block w-full" :value="old('name', auth()->user()->seller->merchant)" required autofocus autocomplete="merchant" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('藍新訂單加密金鑰')" />
                            <x-text-input id="secret_key" name="secret_key" type="text" class="mt-1 block w-full" :value="old('name', auth()->user()->seller->secret_key)" required autofocus autocomplete="secret_key" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('藍新訂單加密IV')" />
                            <x-text-input id="secret_iv" name="secret_iv" type="text" class="mt-1 block w-full" :value="old('name', auth()->user()->seller->secret_iv)" required autofocus autocomplete="secret_iv" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('儲存') }}</x-primary-button>

                            @if (session('status') === 'status-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('已儲存') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-seller-layout>
