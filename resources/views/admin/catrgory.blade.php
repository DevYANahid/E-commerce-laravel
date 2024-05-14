@extends('layouts.master-admin')

@section('page-css')
    <style>
        .categoryContent{
            cursor: pointer;
        }
        #subCategoryList{
            display: none;
        }
        #categoryList .category.ul-state-highlight,#subCategoryList .subcategory.ul-state-highlight{
            padding: 24px;
            background-color: #ffffcc;
            border: 1px dotted #ccc;
            cursor: move;
            margin-top: 12px;
        }
    </style>
@endsection

@section('content')
    <!-- begin app-main -->
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-lg-flex flex-nowrap align-items-center">
                        <div class="page-title mr-4 pr-4 border-right">
                            <h1 class="text-capitalize">category</h1>
                        </div>
                        <div class="breadcrumb-bar align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.dashboard')}}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        <a href="{{ route('admin.category') }}">category</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- Notification -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Success Message -->
                    @if (session('message'))
                        <div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none text-capitalize" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ti ti-close"></i>
                            </button>
                        </div>
                    @endif
                    <!-- Success Message from javascript -->
                    <div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none text-capitalize successMessageFormJavascript d-none" role="alert">
                        <span></span>
                        <button type="button" class="close javascriptMessageClose">
                            <i class="ti ti-close"></i>
                        </button>
                    </div>
                <!-- Error Message -->
                    @if ($errors->any())
                        <div class="alert border-0 alert-danger m-b-30 alert-dismissible fade show border-radius-none" role="alert">
                            @foreach ($errors->all() as $error)
                                <p class="text-black-50 font-weight-bold text-capitalize">{{ $error }}</p>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ti ti-close"></i>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card rounded">
                        <div class="card-header">
                            <span class="h4">Product Categories</span>
                            <button type="button" class="btn btn-primary float-right addNewCategoryBtn">Add New Category</button>
                        </div>
                    </div>
                    <ul class="list-unstyled" id="categoryList">
                        @foreach($categories as $category)
                            <li class="mb-3 category" id="{{$category->id}}">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="col-md-8 d-inline-block float-left categoryContent">
                                            <span class="h5">{{$category->category_name}}</span>
                                        </div>
                                        <div class="col-md-4 d-inline-block float-right">
                                            <button type="button" class="btn btn-danger mx-1 btn-social-sm float-right tooltip-wrapper categoryDeleteBtn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Category"><i class="fa fa-times"></i></button>
                                            <button type="button" class="btn btn-success btn-social-sm float-right tooltip-wrapper categoryEditBtn" data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit Category"><i class="dashicons dashicons-edit"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-unstyled ml-5 mt-1 bg-secondary p-1 rounded" id="subCategoryList">
                                    @php
                                        $subcotegorise = $category->subcotegorise()->orderBy('index','asc')->get();
                                    @endphp
                                    @foreach($subcotegorise as $subcategory)
                                    <li class="subcategory" id="{{ $subcategory->id }}">
                                        <div class="card mb-1">
                                            <div class="card-body">
                                                <div class="col-md-8 d-inline-block float-left subcategoryContent">
                                                    <span class="h5">{{$subcategory->name}}</span>
                                                </div>
                                                <div class="col-md-4 d-inline-block float-right">
                                                    <button type="button" class="btn btn-danger mx-1 btn-social-sm float-right tooltip-wrapper subcategoryDeleteBtn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Subcategory"><i class="fa fa-times"></i></button>
                                                    <button type="button" class="btn btn-success btn-social-sm float-right tooltip-wrapper subcategoryEditBtn" data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit Subcategory"><i class="dashicons dashicons-edit"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                    <li class="my-1 addSubCategory">

                                    </li>
                                    <button id="{{ $category->id }}" type="button" class="btn btn-secondary addSubCategoryBtn my-2">Add Sub-Category</button>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->

    <!-- Add New Category Modal -->
    <div class="modal fade" id="AddNewCategoryModal" tabindex="-1" role="dialog" aria-labelledby="AddNewCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddNewCategoryModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="categoryName">Write A Category Name <span class="text-warning"><i class="fa fa-star"></i></span></label>
                            <input class="form-control" type="text" name="category_name" id="categoryName" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Add New Category Modal -->

    <!-- Update Category & Subcategory Modal -->
    <div class="modal fade" id="updateCategoryAndSubcategoryModal" tabindex="-1" role="dialog" aria-labelledby="updateCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title updateCategoryAndSubcategoryTitle" id="updateCategoryModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" class="updateCategoryForm">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="updateCategoryName" class="updateCategoryAndSubcategoryFormLabel"></label>
                            <input class="form-control updateCategoryAndSubcategoryFormInput" type="text" name="" id="updateCategoryName" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Update Category Modal -->
@endsection

@section('page-script')
    <script !src="">
        $(function () {
            $('.categoryContent').on('click',function () {
                $(this).parent().parent().parent().find('ul').toggleClass('d-block');
            });

            $('.addSubCategoryBtn').on('click',function () {
                var categoryId = $(this).parent().parent().attr('id');

                $('.addSubCategory').empty().append('<div class="card">\n' +
                    '    <div class="card-body">\n' +
                    '        <form action="{{ route('subCategory.store') }}" method="post">\n' +
                    '            @csrf\n' +
                    '            <div class="form-group">\n' +
                    '                <label for="subCategoryName">Write A Sub-Category Name <span class="text-warning"><i class="fa fa-star"></i></span></label>\n' +
                    '                <input class="form-control" type="text" name="subcategory_name" id="subCategoryName" required>\n' +
                    '               <input type="hidden" name="category_id" value="'+ categoryId +'">' +
                    '            </div>\n' +
                    '            <div class="form-group">\n' +
                    '                <button type="submit" class="btn btn-primary">Save</button>\n' +
                    '            </div>\n' +
                    '        </form>\n' +
                    '    </div>\n' +
                    '</div>\n')
            })
        })
    </script>
@endsection
