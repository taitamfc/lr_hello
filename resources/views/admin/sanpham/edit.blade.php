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
    $checked_tags = $item->tags->pluck('id')->toArray();
?>

<ol class="breadcrumb mb-4 mt-4">
    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Sửa Sản Phẩm</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Sửa sản phẩm
    </div>
    <div class="card-body">
        <form action="{{ route('san-pham.update',$item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="name">Tên Sản Phẩm</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $item->name }}">
                <span style="color:red;">{{ $errors->first('name') }}</span>
            </div>

            <div class="form-group mb-2">
                <label for="price">Giá Sản Phẩm</label>
                <input type="text" name="price" class="form-control" id="price" value="{{ $item->price }}">
                {{ $errors->first('price') }}
            </div>

            <div class="form-group mb-2">
                <label for="image">Hình Ảnh</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>


            <div class="form-group mb-2">
                <label for="description">Mô Tả</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ $item->description }}</textarea>
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
                        <?php if( in_array( $tag->id, $checked_tags ) ): ?>
                        checked    
                        <?php endif;?>
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