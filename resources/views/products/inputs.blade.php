<div class="row">
    <div class="form-group col-lg-8 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="image">Image:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
            placeholder="Imagem" />
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="category_id">Categoria:</label>
        <select class="form-select form-select-lg @error('category_id') is-invalid @enderror" id="category_id"
            name="category_id">
            <option disabled selected value="">Select Category</option>
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
        <label for="name">Name:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
            placeholder="Name" value="{{ old('name') }}" />
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="origin">Origin:</label>
        <select class="form-select form-select-lg @error('origin') is-invalid @enderror" id="origin" name="origin">
            <option disabled selected value="">Select Origin</option>
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
        <label for="brand">Brand:</label>
        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand"
            placeholder="Brand" value="{{ old('brand') }}" />
        @error('brand')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="price">Price:</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
            placeholder="Price" value="{{ old('price') }}" />
        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="price_cost">Price Cost:</label>
        <input type="text" class="form-control @error('price_cost') is-invalid @enderror" id="price_cost"
            name="price_cost" placeholder="Price Cost" value="{{ old('price_cost') }}" />
        @error('price_cost')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="quantity">Quantity:</label>
        <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="quantity"
            name="quantity" placeholder="Quantity" value="{{ old('quantity') }}" />
        @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="warranty">Warranty:</label>
        <input type="text" class="form-control @error('warranty') is-invalid @enderror" id="warranty"
            name="warranty" placeholder="Warranty" value="{{ old('warranty') }}" />
        @error('warranty')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="width">Width:</label>
        <input type="text" class="form-control @error('width') is-invalid @enderror" id="width" name="width"
            placeholder="Width" value="{{ old('width') }}" />
        @error('width')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="height">Height:</label>
        <input type="text" class="form-control @error('height') is-invalid @enderror" id="height"
            name="height" placeholder="Height" value="{{ old('height') }}" />
        @error('height')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="depth">Depth:</label>
        <input type="text" class="form-control @error('depth') is-invalid @enderror" id="depth"
            name="depth" placeholder="Depth" value="{{ old('depth') }}" />
        @error('depth')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="net_weight">Net Weight:</label>
        <input type="text" class="form-control @error('net_weight') is-invalid @enderror" id="net_weight"
            name="net_weight" placeholder="Net Weight" value="{{ old('net_weight') }}" />
        @error('net_weight')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="gross_weight">Gross Weight:</label>
        <input type="text" class="form-control @error('gross_weight') is-invalid @enderror" id="gross_weight"
            name="gross_weight" placeholder="Gross Weight" value="{{ old('gross_weight') }}" />
        @error('gross_weight')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="localization">Localization:</label>
        <input type="text" class="form-control @error('localization') is-invalid @enderror" id="localization"
            name="localization" placeholder="Localization" value="{{ old('localization') }}" />
        @error('localization')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="expiration_date">Expiration Date:</label>
        <input type="date" class="form-control @error('expiration_date') is-invalid @enderror"
            id="expiration_date" name="expiration_date" placeholder="Expiration Date"
            value="{{ old('expiration_date') }}" />
        @error('expiration_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="description">Description:</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
            rows="3">{{ old('description') }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="notes">Notes:</label>
        <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
        @error('notes')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
