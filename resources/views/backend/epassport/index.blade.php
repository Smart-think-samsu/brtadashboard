
@extends('backend.master.layout.app')
@section('content')

<div class="content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                @if(session('success'))
                    <div class="alert alert-success">
                        <p>{{session('success')}}</p>
                    </div>
                @endif


                <table border="0" cellspacing="5" cellpadding="5">
                    <tbody>
                        <tr>
                            <td>Start date:</td>
                            <td><input type="text" id="min" name="min"></td><span style="margin-left:5px;"></span>
                            <td>End date:</td>
                            <td><input type="text" id="max" name="max"></td>                
                        </tr>            
                    </tbody>
                </table>
                <br>
                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <!-- <th>id</th> -->
                            <th>Post_Code</th>
                            <th>Barcode</th>
                            <th>Phone</th>
                            <th>Date$Time</th>
                            <!-- <th>barcode</th> -->
                            <th>booking status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($epassports as $k => $epassport)
                        <tr>
                            <td>{{++$k}}</td>
                            <!-- <td>{{$epassport->id}}</td> -->
                            <td>{{$epassport->post_code}}</td>
                            <td>{{$epassport->barcode}}</td>
                            <td>{{$epassport->phone}}</td>            
                            <td>{{($epassport->created_at)->format('Y-m-j g:i a')}}</td>                  
                            <td>{{$epassport->booking_status}}</td>             
                        </tr> 
                    @endforeach           
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[4] );
  
         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );
  
 $(document).ready(function() {
     // Create date inputs
     minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });
  
     // DataTables initialisation
     var table = $('#example').DataTable();
  
     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
 });


</script>   
@endpush