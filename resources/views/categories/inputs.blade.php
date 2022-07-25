<div class="row">
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="name">Name:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
            placeholder="Name" value="{{ old('name') }}" />
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3">
        <label for="description">Description:</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
            rows="3">{{ old('description') }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
