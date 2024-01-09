<h1>Lista de Contas</h1>

<a href="{{ route('accounts.create') }}">Adicionar Conta</a>

<table>
    <thead>
        <th>Nome</th>
        <th>Banco</th>
        <th>Tipo</th>
        <th>Saldo</th>
        <th>Vencimento</th>
    </thead>
    <tbody>
        @forelse ($accounts as $account)
            <tr>
                <td>{{ $account['name'] }}</td>
                <td>{{ $account['bank'] }}</td>
                <td>{{ $account['type'] }}</td>
                <td>{{ $account['balance'] }}</td>
                <td>{{ $account['due_date'] }}</td>
                <td>
                    <a href="{{ route('accounts.show', $account['id']) }}">Ver</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Nenhum registro encontrado.</td>
            </tr>
        @endforelse
    </tbody>
</table>