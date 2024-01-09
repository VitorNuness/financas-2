<h1>New Accounts</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('accounts.store') }}" method="POST">
    @csrf
    <input name="name" type="text" placeholder="Ex. Minha Conta" value="{{ old('name') }}">
    <input name="bank" type="text" placeholder="Ex. Meu Banco" value="{{ old('bank') }}">
    <select name="type">
        <option value="current">Conta Corrente</option>
        <option value="savings">Conta Poupança</option>
        <option value="credit">Cartão de Crédito</option>
        <option value="outhers">Outro</option>
    </select>
    <input type="number" name="balance" step="0.01" placeholder="Ex. 0,00" value="{{ old('balance') }}">
    <input type="number" name="due_date" placeholder="Ex. 10" value="{{ old('due_date') }}">
    <button type="submit">Enviar</button>
</form>