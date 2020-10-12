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
                <form action="{{ route('post.produk.add') }}" id="formAddProduk" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 pr-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="kodeProduk">Brand ID</label>
                                        <input type="text" class="form-control" name="brandId" id="brandId">
                                    </div>
                                    <div class="form-group">
                                        <label for="namaProduk">Nama Produk</label>
                                        <input type="text" class="form-control" name="namaProduk" id="namaProduk">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="bobotProduk">SKU</label>
                                        <input type="text" class="form-control" name="sku" id="sku">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="hargaProduk">Harga</label>
                                        <input type="text" class="form-control" name="hargaProduk" id="hargaProduk">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="descProduk">Deskripsi Produk</label>
                                        <textarea class="form-control" name="descProduk" id="descProduk" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 pr-5">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div id="varian">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="stokProduk">Stock</label>
                                                    <input type="text" class="form-control" name="stokProduk[]" id="stokProduk">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="stokProduk">Ukuran</label><br>
                                                    <input type="text" class="form-control" name="ukuran[]" id="ukuran">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="stokProduk">Warna</label><br>
                                                    <input type="text" class="form-control" name="warna[]" id="warna">
                                                </div>
                                            </div>
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
                                            <img src="" width="144" alt="">
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
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection