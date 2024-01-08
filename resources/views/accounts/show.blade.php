<h1>Detalhes da Conta: {{ $account->name }}</h1>
<ul>
    <li>{{ $account->name }}</li>
    <li>{{ $account->bank }}</li>
    <li>{{ $account->type }}</li>
    <li>{{ $account->balance }}</li>
    <li>{{ $account->due_date }}</li>
</ul>

<a href="{{ route('accounts.index') }}">Voltar</a>