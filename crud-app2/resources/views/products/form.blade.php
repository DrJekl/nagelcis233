<div class="mb-3">
    <label for="productName" class="form-label">Product Name</label>
<div class="input-group">
  <input name="name" type="text" class="form-control col-5" placeholder="Product name" id="productName" value="{{ old('name', $product->name) }}">
</div>
</div>

<div class="mb-3">
    <label for="price" class="form-label">Price</label>
<div class="input-group">
  <span class="input-group-text">$</span>
  <input name="price" type="Number" step="0.01" min="0" class="form-control" placeholder="3.50" aria-label="Price" id="price" value="{{ old('price', $product->price) }}">
</div>
</div>

<div class="mb-3">
  <label for="basic-url" class="form-label">Image URL</label>
  <div class="input-group">
    <span class="input-group-text" id="image">https://example.com/image/</span>
    <input name="image" type="text" class="form-control" id="basic-url" aria-describedby="image"  value="{{ old('image', $product->image) }}">
  </div>
</div>

<div class="mb-3">
<label for="number" class="form-label">Product Number</label>
<div class="input-group">
  <input name="item_number" type="Number" class="form-control" placeholder="1234" aria-label="Product Number" id="number"  value="{{ old('item_number', $product->item_number) }}">
</div>
</div>

<div class="form-floating mb-3">
  <textarea name="description" class="form-control" placeholder="Describe the product" id="description" style="height: 100px">{{ old('description', $product->description) }}</textarea>
  <label for="description">Description</label>
</div>
