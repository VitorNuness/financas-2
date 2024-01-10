<h1>Nova Conta</h1>

<x-alert/>

<form action="{{ route('accounts.store') }}" method="POST">
    @include('accounts.partials.form')
</form>
<a href="{{ route('accounts.index') }}">Cancelar</a>