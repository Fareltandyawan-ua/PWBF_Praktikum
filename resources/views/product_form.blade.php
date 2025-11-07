<form action="{{ route('product.store') }}" method="POST">
    @csrf
    <label>Judul Produk</label>
    <input type="text" name="title" value="{{ old('title') }}">
    @error('title')
        <div style="color:red;">{{ $message }}</div>
    @enderror
    <br>

    <label>Harga</label>
    <input type="text" name="price" value="{{ old('price') }}">
    @error('price')
        <div style="color:red;">{{ $message }}</div>
    @enderror
    <br>

    <button type="submit">Simpan</button>
</form>
