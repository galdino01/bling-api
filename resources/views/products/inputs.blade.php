<div class="form-group">
    <label for="file">Imagem do produto:</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="images" placeholder="Imagem do produto">
    @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-floating mt-3">
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nome do produto">
    <label for="name">Nome</label>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-floating mt-3">
    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Preço do produto">
    <label for="price">Preço</label>
    @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-floating mt-3">
    <input type="text" class="form-control @error('stock') is-invalid @enderror" id="quantity" name="quantity" placeholder="Estoque do produto">
    <label for="quantity">Quantidade</label>
    @error('stock')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-floating mt-3">
    <select class="form-select form-select-lg @error('category') is-invalid @enderror" id="category" name="category">
        <option disabled selected value="">Selecione</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <label for="category">Categoria</label>
    @error('category')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-floating mt-3">
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"></textarea>
    <label for="description">Descrição</label>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
