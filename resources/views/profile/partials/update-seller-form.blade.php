<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('成為賣家') }}
        </h2>
    </header>

    <form class="update d-inline-block" action="{{ route('users.seller', ['user' => $user->id]) }}" method="post">
        @csrf
        @method('PATCH')
        <button class="btn btn-success" type="submit">申請成為賣家</button>
    </form>
</section>
