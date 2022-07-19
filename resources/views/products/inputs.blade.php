<div class="row">
    <div class="form-group col-lg-8 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="file">Imagem:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="Imagem" multiple/>
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="category_id">Categoria:</label>
        <select class="form-select form-select-lg @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
            <option disabled selected value="">Selecione a categoria</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-8 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="name">Nome:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nome" value="{{ old('name') }}"/>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="origin">Origem:</label>
        <select class="form-select form-select-lg @error('origin') is-invalid @enderror" id="origin" name="origin">
            <option disabled selected value="">Selecione a origem</option>
            <option value="nacional">Nacional</option>
            <option value="importado">Importado</option>
        </select>
        @error('category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="brand">Marca:</label>
        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" placeholder="Marca" value="{{ old('brand') }}"/>
        @error('brand')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="price">Preço:</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Preço" value="{{ old('price') }}"/>
        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="price_cost">Preço Custo:</label>
        <input type="text" class="form-control @error('price_cost') is-invalid @enderror" id="price_cost" name="price_cost" placeholder="Preço Custo" value="{{ old('price_cost') }}"/>
        @error('price_cost')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="quantity">Quantidade:</label>
        <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="Quantidade" value="{{ old('quantity') }}"/>
        @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="warranty">Garantia:</label>
        <input type="text" class="form-control @error('warranty') is-invalid @enderror" id="warranty" name="warranty" placeholder="Garantia" value="{{ old('warranty') }}"/>
        @error('warranty')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="width">Largura:</label>
        <input type="text" class="form-control @error('width') is-invalid @enderror" id="width" name="width" placeholder="Largura" value="{{ old('width') }}"/>
        @error('width')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="height">Altura:</label>
        <input type="text" class="form-control @error('height') is-invalid @enderror" id="height" name="height" placeholder="Altura" value="{{ old('height') }}"/>
        @error('height')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="depth">Profundidade:</label>
        <input type="text" class="form-control @error('depth') is-invalid @enderror" id="depth" name="depth" placeholder="Profundidade" value="{{ old('depth') }}"/>
        @error('depth')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="net_weight">Peso liquido:</label>
        <input type="text" class="form-control @error('net_weight') is-invalid @enderror" id="net_weight" name="net_weight" placeholder="Peso liquido" value="{{ old('net_weight') }}"/>
        @error('net_weight')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="gross_weight">Peso Bruto:</label>
        <input type="text" class="form-control @error('gross_weight') is-invalid @enderror" id="gross_weight" name="gross_weight" placeholder="Peso Bruto" value="{{ old('gross_weight') }}"/>
        @error('gross_weight')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="localization">Localização:</label>
        <input type="text" class="form-control @error('localization') is-invalid @enderror" id="localization" name="localization" placeholder="Localização" value="{{ old('localization') }}"/>
        @error('localization')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="expiration_date">Data de Validade:</label>
        <input type="date" class="form-control @error('expiration_date') is-invalid @enderror" id="expiration_date" name="expiration_date" placeholder="Data de Validade" value="{{ old('expiration_date') }}"/>
        @error('expiration_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="description">Descrição:</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="notes">Notas:</label>
        <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
        @error('notes')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
