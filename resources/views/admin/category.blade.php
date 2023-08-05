@extends('layouts.admin',['menu' => 'category'])
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('storage/admin/css/jsgrid.css')}}">
@endPush
@section('content')
    <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Category
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Category</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5> Category</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="categoryList" class="product-physical"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>
@endSection
@push('script')
    <!-- Jsgrid js-->
    <script src="{{asset('storage/admin/js/jsgrid/jsgrid.min.js')}}"></script>
    {{-- <script src="{{asset('storage/admin/js/jsgrid/jsgrid-manage-product.js')}}"></script> --}}
      <script>

          (function($) {
    "use strict";
    $("#categoryList").jsGrid({
        width: "100%",
        filtering: true,
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
        autoload: true,
        pActionSize: 15,
        pActionButtonCount: 5,
        deleteConfirm: "Do you really want to delete the category?",
        controller: {
            loadData: function(filter) {
                  return $.ajax({
                        type: "GET",
                        url: "/api/category-list",
                        data: filter
                    });

            },
               insertItem: function(data) {
                    var formData = new FormData();
                    formData.append("Category", data.Category);
                   formData.append("position", data.position);
                    formData.append("Status", data.Status);

                    return $.ajax({
                        type: "POST",
                        url: "/api/add-category",
                        enctype: 'multipart/form-data',
                        data: formData,
                        contentType: false,
                        processData: false,
                    });
                },
                 updateItem: function(data) {
                    var formData = new FormData();
                    formData.append("id", data.id);
                    formData.append("Category", data.Category);
                    formData.append("position", data.position);
                    formData.append("Status", data.Status);
                    return $.ajax({
                        type: "POST",
                       url: "/api/update-category",
                        enctype: 'multipart/form-data',
                        data: formData,
                        contentType: false,
                        processData: false,
                    });
                 },
                deleteItem: function(data) {
                    return $.ajax({
                        type: "DELETE",
                        url: "/api/delete-category",
                        data: data
                    });
                },
        },
        fields: [

             { name: "id", type: "text", visible : false},
            { name: "Category", type: "text", holder:"Enter the Category..",width: 100},
            { name: "position", type: "number", holder:"Enter the position..",width: 100},
            { name: "Status", type: "checkbox", width: 50},
            { type: "control" ,addButton: false}
        ]
    });
})(jQuery);

    </script>

@endPush
