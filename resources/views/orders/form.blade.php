<form id="{{ sprintf('%05d', random_int(0, ((10 ** 5) - 1))) }}" action="{{ route('orders.store') }}" method="POST">
    @csrf
    <input hidden type="text" name="desconto" value="{{ $api_order['desconto'] }}">
    <input hidden type="text" name="observacoes" value="{{ $api_order['observacoes'] }}">
    <input hidden type="text" name="observacaoInterna" value="{{ $api_order['observacaointerna'] }}">
    <input hidden type="text" name="data" value="{{ $api_order['data'] }}">
    <input hidden type="text" name="numero" value="{{ $api_order['numero'] }}">
    <input hidden type="text" name="numeroOrdemCompra" value="{{ $api_order['numeroordemcompra'] }}">
    <input hidden type="text" name="vendedor" value="{{ $api_order['vendedor'] }}">
    <input hidden type="text" name="valorFrete" value="{{ $api_order['valorfrete'] }}">
    <input hidden type="text" name="outrasDespesas" value="{{ $api_order['outrasdespesas'] }}">
    <input hidden type="text" name="totalProdutos" value="{{ $api_order['totalprodutos'] }}">
    <input hidden type="text" name="totalVenda" value="{{ $api_order['totalvenda'] }}">
    <input hidden type="text" name="idCliente" value="{{ $api_order['cliente']['id'] }}">

    <input type="submit" class="font-weight-bold btn btn-primary" value="Salvar no Banco">
</form>
