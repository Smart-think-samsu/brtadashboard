@extends('backend.master.layout.app')
@section('content')
<div class="content">
    <div class="container">
        <div class="card" style="width:580px;margin: 0 auto;">
            <div class="card-header">
                <h2>BRTA Status Create form</h2>
            </div>
            <div class="card-body">
                <form action="{{Route('brta_status.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        <label for="total_process">Total Received</label>
                        <input type="text" class="form-control border-success" name="total_process" placeholder="Enter total received" required="">
                        </div>
                        <div class="col-md-12 mb-3">
                        <label for="total_deliver">Supporting Document</label>
                        <input id="myFileInput" type="file" accept="image/*;capture=camera">

                        <!-- <input type="file" id="capture" accept="image/*" capture="camera"> -->
                        <!-- <input type="file" class="form-control border-info" name="total_deliver" placeholder="Enter total Delivered" required=""> -->
                        </div>            
                    </div>

                    
  <!-- <input type="file" style="display: none;" id="upload_file" name="upload_file" accept="image/*" capture="camera" /> -->
 

                   
                  
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



<script>
    



    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $('#blah').attr('src', e.target.result);
    //         }

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }

    // $("#imgInp").change(function(){
    //     readURL(this);
    // });
</script>


  
@endsection
@push('script')

<script>
var myInput = document.getElementById('myFileInput');
console.log(myInput);
function sendPic() {
    var file = myInput.files[0];
    console.log(file);
    // Send file here either by adding it to a `FormData` object 
    // and sending that via XHR, or by simply passing the file into 
    // the `send` method of an XHR instance.
}

myInput.addEventListener('change', sendPic, false);
</script>

@endpush