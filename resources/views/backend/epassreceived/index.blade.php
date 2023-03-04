
@extends('backend.master.layout.app')
@section('content')

<div class="content">
  <div class="container" style="margin-top:10px;">
    @if(session('success'))
        <div class="alert alert-success">
            <p>{{session('success')}}</p>
        </div>
    @endif


    <table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>Start date:</td>
            <td><input type="text" id="min" name="min"></td> <span style="margin-left:5px;"></span>
            <td>End date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
        <!-- <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr> -->
    </tbody></table>
    <br>
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>SI</th>
                <th>Total Received</th>
                <th>Supporting Document</th>
                <th>Date&Time</th>
                <!-- <th>Time</th> -->
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
          @foreach($passbookinginfos as $k => $passbookinginfo)
            <tr>
                <td>{{++$k}}</td>
                <td>{{$passbookinginfo->total_receved}}</td>
                <td><img src="{{asset('img/PDF.webp')}}" alt="" height="30px" width="25px"><a href="{{ asset('uploads/posts').'/'.$passbookinginfo->edocument }}" target="_blank"> View</a></td>
                <td>{{($passbookinginfo->created_at)->format('F j, Y, g:i a')}}</td>
               
            </tr> 
          @endforeach           
        </tbody>
        <!-- <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot> -->
    </table>


    



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
