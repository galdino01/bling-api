<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{

    protected $api_key;

    public function __construct()
    {
        $this->api_key = env('BLING_API_KEY', '/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = Product::all();

            $list = Http::get('https://bling.com.br/Api/v2/produtos/json/&apikey='.$this->api_key)->json();
            $api_products = $list['retorno']['produtos'];

            return view('products.index', compact('api_products', 'products'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong', 'error' => $ex->getMessage()], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product = new Product();

            $product->id = $request->id;

            $product->idFabricante = $request->idFabricante;
            $product->idGrupoProduto = $request->idGrupoProduto;
            $product->idCategoria = $request->idCategoria;

            $product->codigo = $request->codigo;
            $product->descricao = $request->descricao;
            $product->tipo = $request->tipo;
            $product->situacao = $request->situacao;
            $product->unidade = $request->unidade;
            $product->preco = $request->preco;
            $product->precoCusto = $request->precoCusto;
            $product->descricaoCurta = $request->descricaoCurta;
            $product->descricaoComplementar = $request->descricaoComplementar;
            $product->dataInclusao = $request->dataInclusao;
            $product->dataAlteracao = $request->dataAlteracao;
            $product->imageThumbnail = $request->imageThumbnail;
            $product->urlVideo = $request->urlVideo;
            $product->nomeFornecedor = $request->nomeFornecedor;
            $product->codigoFabricante = $request->codigoFabricante;
            $product->marca = $request->marca;
            $product->class_fiscal = $request->class_fiscal;
            $product->cest = $request->cest;
            $product->origem = $request->origem;
            $product->linkExterno = $request->linkExterno;
            $product->observacoes = $request->observacoes;
            $product->grupoProduto = $request->grupoProduto;
            $product->garantia = $request->garantia;
            $product->descricaoFornecedor = $request->descricaoFornecedor;
            $product->pesoLiq = $request->pesoLiq;
            $product->pesoBruto = $request->pesoBruto;
            $product->estoqueMinimo = $request->estoqueMinimo;
            $product->estoqueMaximo = $request->estoqueMaximo;
            $product->gtin = $request->gtin;
            $product->gtinEmbalagem = $request->gtinEmbalagem;
            $product->larguraProduto = $request->larguraProduto;
            $product->alturaProduto = $request->alturaProduto;
            $product->profundidadeProduto = $request->profundidadeProduto;
            $product->unidadeMedida = $request->unidadeMedida;
            $product->itensPorCaixa = $request->itensPorCaixa;
            $product->volumes = $request->volumes;
            $product->localizacao = $request->localizacao;
            $product->crossdocking = $request->crossdocking;
            $product->condicao = $request->condicao;
            $product->freteGratis = $request->freteGratis;
            $product->producao = $request->producao;
            $product->dataValidade = $request->dataValidade;
            $product->spedTipoItem = $request->spedTipoItem;

            $product->save();

            return redirect(route('products.index'));
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Something went wrong', 'error' => $ex->getMessage()], 500);
        }
    }
}
