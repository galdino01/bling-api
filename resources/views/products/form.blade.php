<form id="{{ $api_product['id'] }}" action="{{ route('products.store') }}" method="POST">
    @csrf
    <input hidden type="text" name="id" value="{{ $api_product['id'] }}">

    <input hidden type="text" name="idFabricante" value="{{ $api_product['idFabricante'] }}">
    <input hidden type="text" name="idGrupoProduto" value="{{ $api_product['idGrupoProduto'] }}">
    <input hidden type="text" name="idCategoria" value="{{ $api_product['categoria']['id'] }}">

    <input hidden type="text" name="codigo" value="{{ $api_product['codigo'] }}">

    <input hidden type="text" name="descricao" value="{{ $api_product['descricao'] }}">
    <input hidden type="text" name="tipo" value="{{ $api_product['tipo'] }}">
    <input hidden type="text" name="situacao" value="{{ $api_product['situacao'] }}">
    <input hidden type="text" name="unidade" value="{{ $api_product['unidade'] }}">
    <input hidden type="text" name="preco" value="{{ $api_product['preco'] }}">
    <input hidden type="text" name="precoCusto" value="{{ $api_product['precoCusto'] }}">
    <input hidden type="text" name="descricaoCurta" value="{{ $api_product['descricaoCurta'] }}">
    <input hidden type="text" name="descricaoComplementar" value="{{ $api_product['descricaoComplementar'] }}">
    <input hidden type="text" name="dataInclusao" value="{{ $api_product['dataInclusao'] }}">
    <input hidden type="text" name="dataAlteracao" value="{{ $api_product['dataAlteracao'] }}">
    <input hidden type="text" name="imageThumbnail" value="{{ $api_product['imageThumbnail'] }}">
    <input hidden type="text" name="urlVideo" value="{{ $api_product['urlVideo'] ? $api_product['urlVideo'] : '' }}">
    <input hidden type="text" name="nomeFornecedor" value="{{ $api_product['nomeFornecedor'] }}">
    <input hidden type="text" name="codigoFabricante" value="{{ $api_product['codigoFabricante'] }}">
    <input hidden type="text" name="marca" value="{{ $api_product['marca'] ? $api_product['marca'] : '' }}">
    <input hidden type="text" name="class_fiscal" value="{{ $api_product['class_fiscal'] }}">
    <input hidden type="text" name="cest" value="{{ $api_product['cest'] ? $api_product['cest'] : '' }}">
    <input hidden type="text" name="origem" value="{{ $api_product['origem'] }}">
    <input hidden type="text" name="linkExterno" value="{{ $api_product['linkExterno'] ? $api_product['linkExterno'] : '' }}">
    <input hidden type="text" name="observacoes" value="{{ $api_product['observacoes'] ? $api_product['observacoes'] : '' }}">
    <input hidden type="text" name="grupoProduto" value="{{ $api_product['grupoProduto'] ? $api_product['grupoProduto'] : '' }}">
    <input hidden type="text" name="garantia" value="{{ $api_product['garantia'] }}">
    <input hidden type="text" name="descricaoFornecedor" value="{{ $api_product['descricaoFornecedor'] }}">
    <input hidden type="text" name="pesoLiq" value="{{ $api_product['pesoLiq'] }}">
    <input hidden type="text" name="pesoBruto" value="{{ $api_product['pesoBruto'] }}">
    <input hidden type="text" name="estoqueMinimo" value="{{ $api_product['estoqueMinimo'] }}">
    <input hidden type="text" name="estoqueMaximo" value="{{ $api_product['estoqueMaximo'] }}">
    <input hidden type="text" name="gtin" value="{{ $api_product['gtin'] ? $api_product['gtin'] : '' }}">
    <input hidden type="text" name="gtinEmbalagem" value="{{ $api_product['gtinEmbalagem'] ? $api_product['gtinEmbalagem'] : '_' }}">
    <input hidden type="text" name="larguraProduto" value="{{ $api_product['larguraProduto'] }}">
    <input hidden type="text" name="alturaProduto" value="{{ $api_product['alturaProduto'] }}">
    <input hidden type="text" name="profundidadeProduto" value="{{ $api_product['profundidadeProduto'] }}">
    <input hidden type="text" name="unidadeMedida" value="{{ $api_product['unidadeMedida'] }}">
    <input hidden type="text" name="itensPorCaixa" value="{{ $api_product['itensPorCaixa'] }}">
    <input hidden type="text" name="volumes" value="{{ $api_product['volumes'] }}">
    <input hidden type="text" name="localizacao" value="{{ $api_product['localizacao'] ? $api_product['localizacao'] : '' }}">
    <input hidden type="text" name="crossdocking" value="{{ $api_product['crossdocking'] }}">
    <input hidden type="text" name="condicao" value="{{ $api_product['condicao'] }}">
    <input hidden type="text" name="freteGratis" value="{{ $api_product['freteGratis'] }}">
    <input hidden type="text" name="producao" value="{{ $api_product['producao'] }}">
    <input hidden type="text" name="dataValidade" value="{{ $api_product['dataValidade'] }}">
    <input hidden type="text" name="spedTipoItem" value="{{ $api_product['spedTipoItem'] }}">

    <input type="submit" class="font-weight-bold btn btn-primary" value="Salvar no Banco">
</form>
