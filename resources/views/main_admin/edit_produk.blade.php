@extends('main_admin.main')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Produk Baju</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('post.produk.edit') }}" id="formEditProduk" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $id }}">
                    <div class="row">
                        <div class="col-lg-6 pr-5">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="kodeProduk">Brand ID</label>
                                        <input type="text" class="form-control" name="brandId" id="brandId" value="{{ $produk->brand_id }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="namaProduk">Nama Produk</label>
                                        <input type="text" class="form-control" name="namaProduk" id="namaProduk" value="{{ $produk->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="bobotProduk">SKU</label>
                                        <input type="text" class="form-control" name="sku" id="sku" value="{{ $produk->sku }}">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="hargaProduk">Harga</label>
                                        <input type="text" class="form-control" name="hargaProduk" id="hargaProduk" value="{{ $produk->price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="descProduk">Deskripsi Produk</label>
                                        <textarea class="form-control" name="descProduk" id="descProduk" rows="3" >{{ $produk->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="hargaProduk">is displayed</label>
                                        <input type="text" class="form-control" name="is_displayed" id="is_displayed" value="{{ $produk->is_displayed }}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="hargaProduk">Start Promo</label>
                                        <input type="text" class="form-control" name="start_promo" id="start_promo" value="{{ $produk->start_promo }}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="hargaProduk">End Promo</label>
                                        <input type="text" class="form-control" name="end_promo" id="end_promo" value="{{ $produk->end_promo }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="hargaProduk">Promo Price</label>
                                        <input type="text" class="form-control" name="promo_price" id="promo_price" value="{{ $produk->promo_price }}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="hargaProduk">Gender</label>
                                        <input type="text" class="form-control" name="gender" id="gender" value="{{ $produk->gender }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="hargaProduk">Material Upper</label>
                                        <input type="text" class="form-control" name="material_upper" id="material_upper" value="{{ $produk->material_upper }}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="hargaProduk">Material Outer Sole</label>
                                        <input type="text" class="form-control" name="material_outer_sole" id="material_outer_sole" value="{{ $produk->material_outer_sole }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="hargaProduk">Care Label</label>
                                        <textarea class="form-control" name="care_label" id="care_label" rows="4" disabled >{{ $produk->care_label }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="hargaProduk">Measurements</label>
                                        <textarea class="form-control" name="measurements" id="measurements" rows="4" disabled >{{ $produk->measurements }}</textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pr-5">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div id="varian">
                                        <div class="row">
                                            @foreach($varian as $key => $value)
                                                @if($key == 'stok')
                                                    @foreach($value as $key1 => $value1)
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="stokProduk">Stock</label>
                                                                <input type="text" class="form-control" name="stokProduk[]" value="{{ $value1 }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @elseif($key == 'ukuran')
                                                    @foreach($value as $key1 => $value1)
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="ukuran">Ukuran</label><br>
                                                                <input type="text" class="form-control" name="ukuran[]" value="{{ $value1 }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @else
                                                    @foreach($value as $key1 => $value1)
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="warna">Warna</label><br>
                                                                <input type="text" class="form-control" name="warna[]" value="{{ $value1 }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <button id="addMore" class="btn btn-primary">Tambah Varian</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="imageProduk">Image Produk</label>
                                        <div id="imgProdukPreview" class="text-center py-3">
                                            <img src="{{ $produk->gambar }}" width="144" alt="">
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="imageProduk" id="imageProduk">
                                            <label class="custom-file-label label-preview overflow-hidden" for="imageProduk">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 justify-content-end d-flex pr-5">
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection