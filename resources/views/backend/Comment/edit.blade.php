@extends('backend.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('comments.index') }}">Comment</a></li>
            <li class="breadcrumb-item active" aria-current="page">View</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="container-fluid px-xxl-65 px-xl-20">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span>
                </span>View the Comment
            </h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-5">
                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="hk-sec-title">Thông tin bình luận</h5>
                            <div class="form-group row">
                                <div class="col-md">
                                    <label>Name:</label>
                                    {{ $comment->name }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md">
                                    <label>Phone:</label>
                                    {{ $comment->phone }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md">
                                    <label>Question:</label>
                                    {!! $comment->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-xl-7">
                <section class="hk-sec-wrapper">
                    <div class="col-sm-12">
                        <form class="needs-validation" novalidate action="{{ route('comments.update', ['comment' => $comment->id]) }}" method="post">
                            @method('PUT')
                            {{ csrf_field() }}
                            <!-- pagram hiden -->
                            <input type="hidden" name="product_id" value="{{ $comment->product_id }}">
                            @if($comment->parent_id == 0)
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            @endif
                            @if($comment->parent_id > 0)
                                <input type="hidden" name="parent_id" value="{{ $comment->parent_id }}">
                                <input type="hidden" name="cmt_update" value="1">
                            @endif
                            <input type="hidden" name="admin" value="1">
                            <!-- end pagram hiden -->
                            <h5 class="hk-sec-title">Thông tin trả lời của admin</h5>
                            <div class="form-group row">
                                <div class="col-md">
                                    <label>Name</label>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Product name" value="{{ config('common.comment_admin.user_name') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md">
                                    <label>Phone</label>
                                    <input id="phone" name="phone" type="text" class="form-control" placeholder="Product name" value="{{ config('common.comment_admin.phone') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md">
                                    <label>Answer Of Admin</label>
                                    <div class="tinymce-wrap">
                                        <textarea name="description" class="tinymce" rows="3">{{ $comment->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control custom-select">
                                        @foreach($allStatus as $key => $value)
                                            <option value="{{ $value }}" @if($value == $comment->status) selected @endif>{{ $key }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">*Required</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button class="btn btn-info" type="submit">UPDATE</button>
                                    <a href="{{ route('comments.index') }}" class="btn btn-light">CANCEL</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- /Row -->
    </div>
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
    <script src="{{ asset('backend/dist/js/validation-data.js') }}"></script>
@endsection
