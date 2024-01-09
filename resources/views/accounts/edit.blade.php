<h1>Editando Conta: {{ $account->name }}</h1>

<form action="{{ route('accounts.update', $account->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input name="name" type="text" placeholder="Ex. Minha Conta" value="{{ $account->name }}">
    <input name="bank" type="text" placeholder="Ex. Meu Banco" value="{{ $account->bank }}">
    <select name="type">
        <option value="current">Conta Corrente</option>
        <option value="savings">Conta Poupança</option>
        <option value="credit">Cartão de Crédito</option>
        <option value="outhers">Outro</option>
    </select>
    <input type="number" name="balance" placeholder="Ex. 0,00" value="{{ $account->balance }}">
    <input type="number" name="due_date" placeholder="Ex. 10" value="{{ $account->due_date }}">
    <button type="submit">Salvar</button>
</form>
<a href="{{ route('accounts.show', $account->id) }}">Cancelar</a>