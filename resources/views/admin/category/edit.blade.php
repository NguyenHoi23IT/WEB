@extends('layouts.admin')

@section('content')

<div class="card card-default shadow-sm">
   <div class="card-header bg-dark text-white d-flex justify-content-between">
      <strong>Sửa danh mục</strong>
   </div>

   <div class="card-body">
      @include('error')

      <form action="{{route('admin.category.update', ['id' => $category->id])}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')

         <div class="form-group">
            <label for="name" class="font-weight-bold">Tên danh mục</label>
            <input type="text" id="name" class="form-control" name="name" value="{{ isset($category) ? $category->name : '' }}" onkeyup="generateSlug()">
         </div>

         <div class="form-group">
            <label for="slug" class="font-weight-bold">Slug</label>
            <input type="text" id="slug" class="form-control" name="slug" value="{{ isset($category) ? $category->slug : '' }}" readonly>
         </div>

         <div class="form-group">
            <div class="d-flex justify-content-center">
               <button class="btn btn-dark">
                  Cập nhật danh mục
               </button>
            </div>
         </div>
      </form>
   </div>
</div>

@endsection

@section('scripts')
<script>
   function generateSlug() {
      var name = document.getElementById('name').value;
      var slug = name.toLowerCase()
                     .replace(/[áàảãạâấầẩẫậăắằẳẵặ]/g, 'a')
                     .replace(/[éèẻẽẹêếềểễệ]/g, 'e')
                     .replace(/[íìỉĩị]/g, 'i')
                     .replace(/[óòỏõọôốồổỗộơớờởỡợ]/g, 'o')
                     .replace(/[úùủũụưứừửữự]/g, 'u')
                     .replace(/[ýỳỷỹỵ]/g, 'y')
                     .replace(/[^a-z0-9\s-]/g, '') 
                     .replace(/\s+/g, '-')        
                     .replace(/-+/g, '-');         
      document.getElementById('slug').value = slug;
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
      background-color: #343A40;
      color: white;
      font-weight: 600;
      font-size: 1.25rem;
      border-radius: 0.375rem 0.375rem 0 0;
   }

   /* Cải thiện form */
   .form-group {
      margin-bottom: 1.5rem;
   }

   .form-group label {
      font-weight: 600;
   }

   .form-group input {
      border-radius: 0.375rem;
      padding: 0.75rem;
      border: 1px solid #ced4da;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
   }

   .form-group input:focus {
      border-color: #007bff;
      box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
   }

   /* Button */
   .btn-lg {
      font-size: 1.2rem;
      padding: 0.75rem 1.5rem;
   }

   .btn-success {
      color: #ffffff;
      background-color: #28a745;
      border-color: #28a745;
   }

   .btn-success:hover {
      background-color: #218838;
      border-color: #1e7e34;
   }

   .w-100 {
      width: 100%;
   }

   .text-center {
      text-align: center;
   }
</style>
@endsection


