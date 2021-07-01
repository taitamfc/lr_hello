@extends('layout.admin')

@section('content')

@if (count($errors) > 0)

<div class="alert alert-danger mt-4 ">
    <ul class="mb-0" style="padding-left:10px;">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<?php
    //dd($tags);
?>

<ol class="breadcrumb mb-4 mt-4">
    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Thêm Mới Sản Phẩm</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Thêm sản phẩm
    </div>
    <div class="card-body">
        <form action="{{ route('san-pham.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label for="name">Tên Sản Phẩm</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                <span style="color:red;">{{ $errors->first('name') }}</span>
            </div>

            <div class="form-group mb-2">
                <label for="price">Giá Sản Phẩm</label>
                <input type="text" name="price" class="form-control" id="price" value="{{ old('price') }}">
                {{ $errors->first('price') }}
            </div>

            <div class="form-group mb-2">
                <label for="image">Hình Ảnh</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>


            <div class="form-group mb-2">
                <label for="description">Mô Tả</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>

            <div class="form-group mb-2">
            <label for="">Tags</label>
                <?php foreach( $tags as $tag ):?>
                <div class="form-check">
                    <input class="form-check-input" 
                        type="checkbox" 
                        value="<?= $tag->id; ?>" 
                        id="tag_<?= $tag->id; ?>"
                        name="tags[]"
                        >
                    <label class="form-check-label" for="tag_<?= $tag->id; ?>">
                       <?= $tag->name; ?>
                    </label>
                </div>
                <?php endforeach;?>

            </div>

            <div class="form-group mb-2">
                <input type="submit" class="btn btn-primary" value="Lưu">
            </div>
        </form>
    </div>
</div>
@endsection