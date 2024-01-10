<h1>Detalhes da Conta: {{ $account->name }}</h1>

<a href="{{ route('accounts.index') }}">Voltar</a>

<ul>
    <li>{{ $account->name }}</li>
    <li>{{ $account->bank }}</li>
    <li>{{ $account->type }}</li>
    <li>{{ $account->balance }}</li>
    <li>{{ $account->due_date }}</li>
</ul>

<a href="{{ route('accounts.edit', $account->id) }}">Editar</a>
<form action="{{ route('accounts.destroy', $account->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>