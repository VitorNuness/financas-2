<h1>New Accounts</h1>

<form action="{{ route('accounts.store') }}" method="POST">
    @csrf
    <input name="name" type="text" placeholder="Ex. Minha Conta">
    <input name="bank" type="text" placeholder="Ex. Meu Banco">
    <select name="type">
        <option value="current">Conta Corrente</option>
        <option value="savings">Conta Poupança</option>
        <option value="credit">Cartão de Crédito</option>
        <option value="outhers">Outro</option>
    </select>
    <input type="number" name="balance" placeholder="Ex. 0,00">
    <input type="number" name="due_date" placeholder="Ex. 10">
    <button type="submit">Enviar</button>
</form>