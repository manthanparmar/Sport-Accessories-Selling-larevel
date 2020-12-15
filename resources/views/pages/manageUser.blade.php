@extends('layout.adminLayout')

@section('contentAdmin')

 <br/><br/>
        
            <!-- horizontal forms-->
            <!-- forms 3 -->
            <div class="card card_border mb-4">
            <div class="cards__heading">
                    <h3>Users<span></span></h3>
                </div>
                <div class="card-body" style="max-height: 350px; overflow: scroll;">

            <table class="table table-hover">
  <thead>
    <tr style="background-color: #4755AB;border-color: #4755AB;color:#ffffff;font-size: 15px;">
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Type</th>
    <!--  <th scope="col">Actions</th> -->
    </tr>
  </thead>
  <tbody>
    
    <?php $index = 1; ?>
    @foreach($users as $usr)
    <tr style="font-size: 15px;">
      <th scope="row">{{$index}}</th>
      <td>{{$usr->firstName}}   {{$usr->lastName}} </td>
      <td>{{$usr->email}}</td>
      <td>
     <?php if($usr->userType == "ADMIN"){ ?>
      <a href="makeUser/{{$usr->id}}" class="btn btn-primary btn-style" style="height: 40px;width: 180px;" name="makeUser">Make User</button>
     
      <?php }
    
      else{ ?>
             <a href="makeAdmin/{{$usr->id}}" class="btn btn-primary btn-style" style="height: 40px;width: 180px;" name="makeAdmin">Make Admin</button>
  <?php  }  ?>
    </td>
     <?php $index++;?>
</tr>
    @endforeach
    
  </tbody>
</table>
</div>
</div>

<!--Form-->
@stop