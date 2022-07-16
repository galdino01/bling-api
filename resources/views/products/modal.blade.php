<button class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalProducts" type="button">
    <i class="fa fa-plus" aria-hidden="true"></i>
</button>

<div class="modal fade" id="modalProducts" tabindex="-1" aria-labelledby="products" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('products.store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="products">Novo produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('products.inputs')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
