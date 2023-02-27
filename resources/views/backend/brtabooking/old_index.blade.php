
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
            <!-- <div class="fixed-table-toolbar">
                <div class="columns columns-right btn-group float-right">
                    <a class="btn-sm btn-primary" href="https://www.w3schools.com"  type="submit" target="_blank">
                        <i class="fa fa-print" aria-hidden="true"></i>
                    </a>
                </div>
            </div> -->

            <!-- <tr>
                <td>Maximum date:</td>
                <td><input type="text" id="max" name="max"></td>
            </tr> -->
        </tbody>
    </table>
    <!-- <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button> -->
    <br>
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>SI</th>
                <!-- <th>id</th> -->
                <th>DrivingLicenseNo</th>
                <th>Name</th>
                <!-- <th>FatherName</th> -->
                <th>Booking ID</th>
                <th>Status</th>
                <th>Date&Time</th>                
            </tr>
        </thead>
        <tbody>
          @foreach($bookinginfos as $k => $bookinginfo)
            <tr>
                <td>{{++$k}}</td>
                <!-- <td>{{$bookinginfo->id}}</td> -->
                <td>{{$bookinginfo->drivingLicenseNo}}</td>
                <td>{{$bookinginfo->name}}</td>
                <!-- <td>{{$bookinginfo->fatherName}}</td> -->
                <td>{{$bookinginfo->barcode}}</td>             
                <td>{{$bookinginfo->booking_status}}</td>             
                <td>{{($bookinginfo->created_at)->format('Y-m-j')}}</td>             
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
            //console.log(min);
            var max = maxDate.val();
            var date = new Date( data[4] );
    
            if (
                ( min === null && max === null ) ||
                ( min === null && date <= max ) ||
                ( min <= date   && max === null ) ||
                ( min <= date   && date <= max )
            ) {
                //console.log('milon');
                return true;
            }
            // console.log('sarkar');
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
            //console.log('milon');
            table.draw();
        });
    });
  
  </script>


<!-- <script>
  var $table = $('#example')

$(function() {
  $table.bootstrapTable()
})



</script> -->
   
@endpush
