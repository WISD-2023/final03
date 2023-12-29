<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('會員主頁') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("歡迎") }}{{ Auth::user()->name }}{{ __("會員，請透過上方導覽列選擇並切換各項功能。") }} 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
