@extends('backend.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="container-fluid px-xxl-65 px-xl-20">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Create a new product</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">

                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Information</h5>

                    <div class="row">
                        <div class="col-sm">
                            <form class="needs-validation" novalidate action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="name">Name</label>
                                        <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}" required>
                                        <small class="form-text text-muted">*Required</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="slug">Slug</label>
                                        <input id="slug" name="slug" type="text" class="form-control" value="{{ old('slug') }}" required>
                                        <small class="form-text text-muted">*Required</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="sku">SKU</label>
                                        <input id="sku" type="text" class="form-control" name="sku" value="{{ old('sku') }}" required>
                                        <small class="form-text text-muted">*Required</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="categories">Category</label>
                                        <select id="categories" name="categories[]" class="form-control select2" multiple="multiple">
                                            @include('backend.includes.categories_options', ['categories' => $categories, 'dash' => '', 'selected' =>[], 'type' => 'multiple'])
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="product_type">Lo???i s???n ph???m</label> 
                                        <select id="product_type" name="product_type" class="form-control custom-select">
                                            @foreach($typeProduct as $key => $value)
                                                <option value="{{ $value }}">{{ $key }}</option>
                                            @endforeach
                                        </select>
                                        <small class="form-text text-muted">*Required</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-7">
                                        <div class="form-group row">
                                            <div class="col-md">
                                                <label>Short Description</label>
                                                <div class="tinymce-wrap">
                                                    <textarea name="short_description" class="tinymce" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group row">
                                            <div class="col-md">
                                                <label>Thumbnail</label>
                                                <input name="thumbnail" type="file" class="dropify" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md">
                                                <label for="status">Status</label>
                                                <select id="status" name="status" class="form-control custom-select">
                                                    @foreach($allStatus as $key => $value)
                                                        <option value="{{ $value }}">{{ $key }}</option>
                                                    @endforeach
                                                </select>
                                                <small class="form-text text-muted">*Required</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="price">Price</label>
                                                <div class="input-group">
                                                    <input id="price" name="price" type="number" class="form-control"  min="1000" step="1000" value="">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">VN??</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="cost">Price Cost</label>
                                                <div class="input-group">
                                                    <input id="cost" name="cost" type="number" class="form-control" min="1000" step="1000" value="">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">VN??</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Long Description</label>
                                        <div class="tinymce-wrap">
                                            <textarea name="long_description" class="tinymce" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Th??ng s??? k??? thu???t -->
                                <div style="display: block;margin: 0 0px;line-height: 30px;font-size: 14px;color: #333;background: #f3f3f3;text-transform: uppercase;padding: 5px 10px;">
                                    <strong>Th??ng s??? k??? thu???t</strong>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="screen">M??n h??nh</label>
                                        <input id="screen" type="text" class="form-control" name="screen" value="{{ old('screen') }}" required>
                                        <small class="form-text text-muted">*Required</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="camera_rear">Camera sau</label>
                                        <input id="camera_rear" type="text" class="form-control" name="camera_rear" value="{{ old('camera_rear') }}" required>
                                        <small class="form-text text-muted">*Required</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="camera_front">Camera tr?????c</label>
                                        <input id="camera_front" type="text" class="form-control" name="camera_front" value="{{ old('camera_front') }}" required>
                                        <small class="form-text text-muted">*Required</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cpu">H??? ??i???u h??nh - CPU</label>
                                        <input id="cpu" type="text" class="form-control" name="cpu" value="{{ old('cpu') }}" required>
                                        <small class="form-text text-muted">*Required</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="memory">B??? nh??? - L??u tr???</label>
                                        <input id="memory" type="text" class="form-control" name="memory" value="{{ old('memory') }}" required>
                                        <small class="form-text text-muted">*Required</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="connect">K???t n???i</label>
                                        <input id="connect" type="text" class="form-control" name="connect" value="{{ old('connect') }}" required>
                                        <small class="form-text text-muted">*Required</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="charging">Th??ng tin pin - S???c</label>
                                        <input id="charging" type="text" class="form-control" name="charging" value="{{ old('charging') }}" required>
                                        <small class="form-text text-muted">*Required</small>
                                    </div>
                                </div>
                                <!-- end Th??ng s??? k??? thu???t -->
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Images</label>
                                        <div class="dropzone" id="remove_link">
                                            <div class="fallback">
                                                <input name="images" type="file" multiple />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="supplier_id">Supplier</label>
                                        <select id="supplier_id" name="supplier_id" class="form-control"></select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="brand_id">Brand</label>
                                        <select id="brand_id" name="brand_id" class="form-control"></select>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="stock">Stock</label>
                                        <input id="stock" name="stock" type="number" class="form-control" min="0" step="1" value="100">
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <label for="weight">Weight</label>
                                        <input id="weight" name="weight" type="number" class="form-control">
                                    </div> -->
                                    <!-- <div class="col-md-4">
                                        <label>Weight Unit</label>
                                        <select name="weight_unit" class="form-control">
                                            @ foreach($allWeightUnit as $key => $value)
                                                <option value="{{ $value }}">{{ $key }}</option>
                                            @ endforeach
                                        </select>
                                    </div> -->
                                </div>
                                <div class="form-group row">
                                    <!-- <div class="col-md-3">
                                        <label id="length">Length</label>
                                        <input id="length" name="length" type="number" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="width">Width</label>
                                        <input id="width" name="width" type="number" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="height">Height</label>
                                        <input id="height" name="height" type="number" class="form-control">
                                    </div> -->
                                    <!-- <div class="col-md-3">
                                        <label>Dimension Unit</label>
                                        <select name="dimension_unit" class="form-control">
                                            @ foreach($allDimensionUnit as $key => $value)
                                                <option value="{{ $value }}">{{ $key }}</option>
                                            @ endforeach
                                        </select>
                                    </div> -->
                                </div>
                                <div class="form-group row">
                                    <!-- <div class="col-md-6">
                                        <label for="minimum">Minimum</label>
                                        <input id="minimum" name="minimum" type="number" class="form-control" min="1" step="1" value="1">
                                        <small class="form-text text-muted">Minimum quantity in one order</small>
                                    </div> -->
                                    <div class="col-md-6">
                                        <label for="date_available">Date available</label>
                                        <input id="date_available" name="date_available" type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Tags</label>
                                        <select id="input_tags" name="tags[]" class="form-control" multiple="multiple"></select>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit">CREATE</button>
                                        <a href="{{ route('products.index') }}" class="btn btn-light">CANCEL</a>
                                    </div>
                                </div>
                                <input type="file" name="images[]" multiple class="d-none">
                            </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
        <!-- /Row -->
    </div>
@endsection

@section('css')
    <!-- select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Daterangepicker CSS -->
    <link href="{{ asset('backend/vendors/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Dropzone CSS -->
    <link href="{{ asset('backend/vendors/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap Dropify CSS -->
    <link href="{{ asset('backend/vendors/dropify/dist/css/dropify.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('script')
    <!-- Select2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ asset('backend/dist/js/select2-data.js') }}"></script>

    <!-- Bootstrap Input spinner JavaScript -->
    <script src="{{ asset('backend/vendors/bootstrap-input-spinner/src/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('backend/dist/js/inputspinner-data.js') }}"></script>

    <!-- Tinymce JavaScript -->
    <script src="{{ asset('backend/vendors/tinymce/tinymce.min.js') }}"></script>

    <!-- Tinymce Wysuhtml5 Init JavaScript -->
    <script src="{{ asset('backend/dist/js/tinymce-data.js') }}"></script>

    <!-- Dropzone JavaScript -->
    <script src="{{ asset('backend/vendors/dropzone/dist/dropzone.js') }}"></script>

    <!-- Dropify JavaScript -->
    <script src="{{ asset('backend/vendors/dropify/dist/js/dropify.min.js') }}"></script>

    <!-- Daterangepicker JavaScript -->
    <script src="{{ asset('backend/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/daterangepicker/daterangepicker.js') }}"></script>

    <!-- Form Flie Upload Data JavaScript -->
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });

        Dropzone.autoDiscover = false;
        $("div#remove_link").dropzone({
            url: "#",
            autoProcessQueue: false,
            addRemoveLinks: true,
            dictDuplicateFile: "Duplicate Files Cannot Be Uploaded",
            preventDuplicates: true,
            init: function () {
                this.on("addedfile", function (file) {
                    $('.dz-progress').hide();
                    if (this.files.length) {
                        var _i, _len;
                        for (_i = 0, _len = this.files.length; _i < _len - 1; _i++) // -1 to exclude current file
                        {
                            if (this.files[_i].name === file.name && this.files[_i].size === file.size && this.files[_i].lastModified.toString() === file.lastModified.toString()) {
                                this.removeFile(file);
                            }
                        }
                    }
                    setTimeout(() => {
                        var fileList = new DataTransfer();
                        this.files.forEach((file) => {
                            fileList.items.add(file);
                        });
                        document.querySelectorAll('input[name="images[]"]')[0].files = fileList.files;
                    }, 0);
                });
                this.on("removedfile", function (file) {
                    var fileList = new DataTransfer();
                    this.files.forEach((file) => {
                        fileList.items.add(file);
                    });
                    document.querySelectorAll('input[name="images[]"]')[0].files = fileList.files;
                })
            },
        });
    </script>

    <script src="{{ asset('backend/dist/js/slugify.js') }}"></script>
    <script>
        let inputName = document.getElementById('name');
        inputName.onchange = function(){
            document.getElementById('slug').value = slugify(document.getElementById('name').value);
        }
    </script>

    <script src="{{ asset('backend/dist/js/validation-data.js') }}"></script>
    <script>
        $(function() {
            "use strict";
            $('input[name="date_available"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2000,
                "cancelClass": "btn-secondary",
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
        });
    </script>
@endsection
