@csrf
    <input name="name" type="text" placeholder="Ex. Minha Conta" value="{{ $account->name ?? old('name') }}">
    <input name="bank" type="text" placeholder="Ex. Meu Banco" value="{{ $account->bank ?? old('bank') }}">
    <select name="type">
        <option value="current" {{ $account->type ?? old('type') === 'current' ? "selected" : "" }}>Conta Corrente</option>
        <option value="savings" {{ $account->type ?? old('type') === 'savings' ? "selected" : "" }}>Conta Poupança</option>
        <option value="credit" {{ $account->type ?? old('type') === 'credit' ? "selected" : "" }}>Cartão de Crédito</option>
        <option value="outhers" {{ $account->type ?? old('type') === 'outhers' ? "selected" : "" }}>Outro</option>
    </select>
    <input type="number" name="balance" step="0.01" placeholder="Ex. 0,00" value="{{ $account->balance ?? old('balance') }}">
    <input type="number" name="due_date" placeholder="Ex. 10" value="{{ $account->due_date ?? old('due_date') }}">
    <button type="submit">Enviar</button>