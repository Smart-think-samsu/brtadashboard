@extends('backend.master.layout.app')
@section('content')
<div class="content">
    <div class="container">
        <div class="card" style="width:580px;margin: 0 auto;">
            <div class="card-header">
                <h2>New role create</h2>
            </div>
            <div class="card-body">
                <form action="{{Route('role_add.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        <label for="total_process">Role name</label>
                        <input type="text" class="form-control border-success" name="total_process" placeholder="Enter total received" required="">
                        <!-- <div class="text-success small mt-1">
                            Looks good!
                        </div> -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="total_deliver">Role has permission</label><br>
                            <input  type="checkbox" id="vehicle1" name="vehicle1" value="Bike">    <br>                        
                            <input  type="checkbox" id="vehicle2" name="vehicle2" value="Car">       <br>                      
                            <input  type="checkbox" id="vehicle3" name="vehicle3" value="Boat">      <br>                       
                        </div>            
                    </div>
                   
                    <!-- <a class="btn btn-danger btn-sm " data-toggle="modal"
                        data-target="#confirm-delete" href="javascript:;"
                        data-href="">
                        <i class="fas fa-trash-alt"></i>
                    </a> -->
                    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

		<!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('Confarm Submit?') }}</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
		</div>

		<!-- Modal Body -->
        <div class="modal-body">
			 {{ __('You are confarm to submit it?') }}
		</div>

		<!-- Modal footer -->
        <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
			<form action="" class="d-inline btn-ok" method="POST">

                @csrf

                

                <button type="submit" class="btn btn-danger">{{ __('Submit') }}</button>

			</form>
		</div>

      </div>
    </div>
  </div>


                </form>
                <button class="btn btn-primary btn-pill mr-2" data-toggle="modal"
                        data-target="#confirm-delete">Submit</button>
                    <button class="btn btn-light btn-pill" type="submit">Cancel</button>

            </div>
        </div>
    </div>
</div>

{{-- DELETE MODAL --}}

  
@endsection