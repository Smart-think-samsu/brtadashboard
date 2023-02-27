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
                <!-- <a href="javascript:void(0);" 
                    data-href="{{route('users.show',$brta->id)}}" id="show-user"
                    class="edit_product btn btn-sm btn-primary" 
                    > Edit</a> -->



                    <a window.print()
                        href="javascript:void(0)"
                        data-url="{{route('users.show',$brta->id)}}"
                        class="btn btn-sm btn-primary show-user"
                        >show</a>


                    <!-- <td>
                    <img src="{{asset('img/PDF.webp')}}" alt="" height="30px" width="25px"><a href="{{ asset('uploads/posts').'/'.$brta->total_deliver }}" download> Download</a></td> -->
                    <!-- <a href="#myModal"  onClick="GFG_click(this.id)" id="add_cat" data-toggle="modal" data-gallery="example-gallery" class="col-sm-3" data-img-url="{{asset('storage/'.$brta->id)}}">
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
                <div class="carousel-inner" id="slide_image">
                   
                    <!--<div class="carousel-item active">
                        <img src="{{asset('img/PDF.webp')}}" id="mimage" class="d-block w-100"  alt="..." height="460px" width="520px"> 
                    </div> -->


                    <!-- <div class="carousel-item ">
                        <img src="{{asset('img/PDF.webp')}}" class="d-block w-100"  alt="..." height="460px" width="520px"> 
                    </div>

                    <div class="carousel-item ">
                        <img src="{{asset('img/PDF.webp')}}" class="d-block w-100"  alt="..." height="460px" width="520px"> 
                    </div> -->
                    
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

<script type="text/javascript">

//var globalBase_Url = "{$base_url}" + "index.php/user_controller/processAdd/";   

    $(document).ready(function(){
        $('.show-user').on('click',function(){
           console.log('milon sarkar');
           var userURL = $(this).data('url');
            // console.log('Milon');
            $.get(userURL, function (datas){
                $('#myModal').modal('show');
                 //console.log(datas);a
                // slide_image

                var test = '';


                for(var i=0; i<datas.length; i++)  //jquery data slide show
                    
                    {
                        
                    //var acive =
                    // console.log(datas[i].image);

                    test += `<div class="carousel-item ${i==0?'active':''}" >`;
                    
                    test += `<img src="{{asset('uploads/posts/${datas[i].image}')}}" id="mimage" class="d-block w-100"  alt="..." height="460px" width="520px"> `;                     

                    test += `</div>`;
                    };
                
                $('#slide_image').empty();
                $('#slide_image').append(test);
                    
            });    
        });

    });
</script>



@endpush