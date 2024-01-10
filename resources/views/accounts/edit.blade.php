<h1>Editando Conta: {{ $account->name }}</h1>

<x-alert/>

<form action="{{ route('accounts.update', $account->id) }}" method="POST">
    @method('PUT')
    @include('accounts.partials.form', [
        'account' => $account,
    ])
</form>
<a href="{{ route('accounts.show', $account->id) }}">Cancelar</a>