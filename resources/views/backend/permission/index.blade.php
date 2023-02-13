
@extends('backend.master.layout.app')
@section('content')

<div class="content">
  <div class="container" style="margin-top:10px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <form id="MyForm" action="{{Route('role-store',$role->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <table class="table table--light style--two">
                                <thead>
                                    <tr>
                                        <th scope="col">Permission Name</th>
                                        <th scope="col">create</th>
                                        <th scope="col">view</th>
                                        <th scope="col">edit</th>
                                        <th scope="col">delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $k => $item)
                                        <tr>
                                            <td>
                                                {{ $item['title'] }}
                                                <input type="hidden" name="menus[{{$k}}][title]" value="{{ $item['title'] }}" />
                                                <input type="hidden" name="menus[{{$k}}][menu_name]" value="{{ $item['menu_name'] }}" />
                                            </td>
                                            <td>
                                                {{-- <input type="checkbox" name="{{$item['menu_name']}}[create]" value="{{ $item['create'] }}"/> --}}
                                                <input type="checkbox" name="menus[{{$k}}][create]" {{ $item['view'] ? 'checked' : '' }} />
                                            </td>
                                            <td>
                                                <input type="checkbox" name="menus[{{$k}}][view]" {{ $item['view'] ? 'checked' : '' }} />
                                            </td>
                                            <td>
                                                <input type="checkbox" name="menus[{{$k}}][edit]" {{ $item['edit'] ? 'checked' : '' }} />
                                            </td>
                                            <td>
                                                <input type="checkbox" name="menus[{{$k}}][delete]" {{ $item['delete'] ? 'checked' : '' }} />
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>
                                            <input id="SaveBtn" type="button" class="btn btn-primary text-dark" value="Save" />
                                        </td>
                                    </tr>

                                </tbody>
                            </table><!-- table end -->
                        </form>
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>
@push('script')
<script>
    $("#SaveBtn").click(function(){
        // var this_master = $(this);
        $('input[type="checkbox"]').each( function () {
            var checkbox_this = $(this);
            if( checkbox_this.is(":checked") == true ) {
                checkbox_this.attr('value','1');
            } else {
                checkbox_this.prop('checked',true);
                //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA
                checkbox_this.attr('value','0');
            }
        })

        $("#MyForm").submit(); // Submit the form
    });
    // $('#checkbox-value').text($('#checkbox1').val());

// $("#checkbox1").on('change', function() {
//   if ($(this).is(':checked')) {
//     $(this).attr('value', 'true');
//   } else {
//     $(this).attr('value', 'false');
//   }

//   $('#checkbox-value').text($('#checkbox1').val());
// });


// $('input[type="checkbox"]').change(function() {
//     if ($(this).is(':checked')) {
//     $(this).attr('value', 'true');
//   } else {
//     $(this).attr('value', 'false');
//   }
// });
</script>
@endpush



  </div>
</div>
    
@endsection
