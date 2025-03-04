@extends('layouts.admin')

@section('content')

<div class="card card-default" style="min-height: calc(100vh - 100px);">
    <div class="card-header bg-dark text-white d-flex justify-content-between">
        <strong>Bài viết</strong>
        <a href="{{route('admin.blog.create')}}" class="btn btn-light">Thêm bài viết</a>
    </div>
    <div class="card-body">
        @if ($blogs->count()>0)
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th colspan="2" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <td class="text-center">
                        <img src="{{asset('/storage/' . $blog->image)}}" style="width: 150px; height: 80px;"
                            class="img-thumbnail" alt="responsive image">
                    </td>
                    <td>{{ $blog->title }}</td>
                    <td><a href="#" class="text-primary font-weight-bold">{{ $blog->category->name }}</a></td>

                    @if ($blog->trashed())
                    <td class="text-center">
                        <form action="#" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-info btn-sm">Restore</button>
                        </form>
                    </td>
                    @else
                    <td class="text-center">
                        <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    @endif

                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-sm" onclick="handleDelete({{ $blog->id }})">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $blogs->links('pagination::bootstrap-4') }}
        </div>

        <!-- Modal Xác nhận xóa -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn xóa bài viết này không?
                    </div>
                    <div class="modal-footer">
                        <form id="deleteBlogForm" action="{{route('admin.blog.destroy', $blog->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        <h3 class="text-center">Chưa có bài viết nào</h3>
        @endif
    </div>
</div>

@endsection


@section('scripts')
<script>
    function handleDelete(id){
        var form = document.getElementById('deleteBlogForm');
        // form.action = '/blogs/' + id;
        $('#deleteModal').modal('show');
    }
</script>
@endsection


@section('css')
<style>
    /* Cải thiện giao diện card */
.card {
    border-radius: 0.375rem;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #343a40;
    color: white;
    font-weight: 600;
    font-size: 1.25rem;
    border-radius: 0.375rem 0.375rem 0 0;
}

/* Cải thiện bảng */
.table {
    border-collapse: collapse;
    width: 100%;
}

.table th, .table td {
    text-align: left;
    padding: 15px;
    vertical-align: middle;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.table-bordered {
    border: 1px solid #dee2e6;
}

.table-hover tbody tr:hover {
    background-color: #f1f1f1;
}

.table th {
    background-color: #343a40;
    color: white;
}

/* Button */
.btn-lg {
    font-size: 1.2rem;
    padding: 0.75rem 1.5rem;
}

.btn-info {
    color: #ffffff;
    background-color: #17a2b8;
    border-color: #17a2b8;
}

.btn-info:hover {
    background-color: #138496;
    border-color: #117a8b;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

.btn-sm {
    font-size: 0.875rem;
    padding: 0.25rem 0.5rem;
}

/* Modal */
.modal-content {
    border-radius: 0.375rem;
}

.modal-header {
    background-color: #007bff;
    color: white;
    font-weight: 600;
}

.modal-footer {
    background-color: #f8f9fa;
}

.text-center {
    text-align: center;
}

.font-weight-bold {
    font-weight: bold;
}

/* Thêm chút padding cho các thành phần chính */
.card-body {
    padding: 20px;
}

/* Hover effects for rows */
.table tbody tr:hover {
    background-color: #f1f1f1;
    cursor: pointer;
}

/* Cải thiện ảnh */
.img-thumbnail {
    border-radius: 0.375rem;
}

/* Alert style */
.alert {
    border-radius: 0.375rem;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.pagination {
    background-color: #343a40; /* Tương đương với bg-dark của Bootstrap */
}

/* Màu chữ sáng cho các liên kết */
.pagination .page-link {
    color: #3b3b3b; /* Màu chữ sáng cho các trang */
}

/* Thay đổi màu khi hover */
.pagination .page-item:hover .page-link {
    background-color: #495057; /* Màu xám nhạt hơn khi hover */
    color: #ffffff; /* Màu chữ vẫn sáng khi hover */
}

/* Thay đổi màu của trang đang được chọn */
.pagination .page-item.active .page-link {
    background-color: #343a40; /* Màu xanh lam cho trang hiện tại */
    color: #ffffff; /* Màu chữ sáng */
    border: none;
}

</style>
@endsection