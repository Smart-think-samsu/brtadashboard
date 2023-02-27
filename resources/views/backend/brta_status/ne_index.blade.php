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
                <th>Date</th>
                <th>Time</th>
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
          @foreach($brtas as $k => $brta)
            <tr>
                <td>{{++$k}}</td>
                <td>{{$brta->total_process}}</td>
                <td>
                    
                    <img src="{{asset('img/PDF.webp')}}" alt="" height="30px" width="25px"><a href="{{asset('img/PDF.webp')}}" target="_blank"> Download</a></td>
                    <!-- <a href="#myModal" id="add_cat" data-toggle="modal" data-gallery="example-gallery" class="col-sm-3" data-img-url="{{asset('storage/'.$brta->id)}}">
                        <img src="{{asset('img/PDF.webp')}}" class="img-fluid image-control" height="30px" width="25px">
                    </a> -->
                </td>
                <td>{{($brta->created_at)->format('Y-m-d')}}</td>
                <td>{{($brta->created_at)->format('H-m-s')}}</td>
                <!-- <td>jjjj</td> -->
            </tr> 
          @endforeach           
        </tbody>
    </table>
  </div>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">            
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    
                    <div class="carousel-item active">
                        <img src="{{asset('img/PDF.webp')}}" class="d-block w-100"  alt="..." height="460px" width="520px"> 
                    </div>
                    <div class="carousel-item ">
                        <img src="{{asset('img/PDF.webp')}}" class="d-block w-100"  alt="..." height="460px" width="520px"> 
                    </div>
                    <div class="carousel-item ">
                        <img src="{{asset('img/PDF.webp')}}" class="d-block w-100"  alt="..." height="460px" width="520px"> 
                    </div>
                    
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>
    
@endsection


@push('script')

<script>

//var globalBase_Url = "{$base_url}" + "index.php/user_controller/processAdd/";   

    $(document).ready(function(){

        $('#add_cat').on('click',function(){
            console.log('milon');
            $('#add_category').show('slide');
        });

        $('#submit').on('click',function(){

            var name = $('#category_name').val();
            var desc = $('#description').val();

            console.log(globalBase_Url);

            $.ajax({
                type: 'POST',
                url: globalBAse_Url,
                data: {cat_name:name,cat_desc:desc}, //How can I preview this?
                dataType: 'json',
                async: false,
                success: function(d){

                }
            });

        });

    });
</script>



@endpush
