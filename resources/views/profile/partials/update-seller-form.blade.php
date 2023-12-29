<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('成為賣家') }}
        </h2>
    </header>
    @if(auth()->user()->seller != null)
        <p>你已經成為賣家會員</p>
    @endif
    <form class="update d-inline-block" action="{{ route('users.seller', ['user' => $user->id]) }}" method="post">
        @csrf
        @method('PATCH')
        <button class="btn btn-success" type="submit" @if(auth()->user()->seller != null) disabled @endif>申請成為賣家</button>

        @if (session('status') === 'users-updated')
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            {{-- x-init="setTimeout(() => show = false, 2000)" --}}
            class="text-sm text-gray-600"
        >{{ __('提交成功!') }}</p>
        @endif
    </form>
</section>
