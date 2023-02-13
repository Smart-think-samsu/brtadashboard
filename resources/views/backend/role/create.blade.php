@extends('backend.master.layout.app')
@section('content')

<div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <form action="{{Route('role_add.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="payment-method-item">
                            <div class="payment-method-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card border--primary mt-3">
                                            <h5 class="card-header bg--primary">@lang('Role Create Form')</h5>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>@lang('Role Name')</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="name" required value="{{ old('min_limit') }}"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>@lang('Role Slug')</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="slug" required value="{{ old('max_limit') }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-primary btn-pill mr-2" type="submit">Submit</button>
                                                <button class="btn btn-light btn-pill" type="submit">Cancel</button>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


  
@endsection