@extends('layouts.admin',['menu' => 'subcategory'])
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
                                <h3> Sub Category
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active"> SubCategory</li>
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
                                <h5> Sub Category</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="subcategoryList" class="product-physical"></div>
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
              $.ajax({
                        type: "GET",
                        url: "/api/category/dropdown-category-list",
                    }).done(function (response){ 
   "use strict";
    $("#subcategoryList").jsGrid({
        width: "100%",
        filtering: true,
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
        autoload: true,
        pActionSize: 15,
        pActionButtonCount: 5,
        deleteConfirm: "Do you really want to delete the sub category?",
        controller: {
           
            loadData: function(filter) {
                var data = $.Deferred(); // This line is hit.
                var categoryList = null;
                $.ajax({
                        type: "GET",
                        url: "/api/category/sub-category-list",
                        data: filter,
                    }).done(function (response)
                        {
                            // This function is never invoked.
                            debugger;
                         
                            data.resolve(response.subCategoryMaster);
                        });
                        return data.promise();
                
            },
               insertItem: function(data) {
                    var formData = new FormData();
                    formData.append("SubCategory", data.SubCategory);
                    formData.append("CategoryId", data.CategoryId);
                    formData.append("Status", data.Status);
                    formData.append("image", data.Image, data.Image.name);
                    return $.ajax({
                        type: "POST",
                        url: "/api/category/add-sub-category",
                        enctype: 'multipart/form-data',
                        data: formData,
                        contentType: false,
                        processData: false,
                    });
                },
                 updateItem: function(data) {
                  
                    var formData = new FormData();
                    formData.append("id", data.id);
                    formData.append("SubCategory", data.SubCategory);
                    formData.append("CategoryId", data.CategoryId);
                    formData.append("Status", data.Status);
                    if(data.Image &&  data.Image.name !== ''){
                    formData.append("image", data.Image, data.Image.name);
                    }
                    return $.ajax({
                        type: "POST",
                        url: "/api/category/update-sub-category",
                        enctype: 'multipart/form-data',
                        data: formData,
                        contentType: false,
                        processData: false,
                    });
                 },           
                deleteItem: function(data) {
                    return $.ajax({
                        type: "DELETE",
                        url: "/api/category/delete-sub-category",
                        data: data
                    });
                },
        },
        fields: [
             {
                name: "Image",
                itemTemplate: function(val, item) {
                    return $("<img>").attr("src",window.location.origin+item.image).css({ height: 50, width: 50 });
                },
                insertTemplate: function() {
                    var insertControl = this.insertControl = $("<input>").prop("type", "file");
                    
                    return insertControl;
                },
                editTemplate:function() {
                    var insertControl = this.insertControl = $("<input>").prop("type", "file");
                    return insertControl;
                },
                insertValue: function() {
                    return this.insertControl[0].files[0];
                },
                editValue:function() {
                    return this.insertControl[0].files[0];
                },
                align: "center",
                width: 50
            },
             { name: "id", type: "text", visible : false},
            { name: "SubCategory", type: "text", width: 100},
            { name: "CategoryId",  type: "select",items:response, valueField: "Id", textField: "Name", width: 100,visible : true},
            { name: "Status", type: "checkbox", width: 50},
            { type: "control" }
        ]
    });
                     });
 
})(jQuery);
       
    </script>
   
@endPush
