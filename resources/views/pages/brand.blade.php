@extends('layout.adminLayout')

@section('contentAdmin')
<br/><br/>

<div class="card card_border mb-4">
            <div class="cards__heading">
                    <h3>Brands<span></span></h3>
                </div>
                <div class="card-body" style="max-height: 350px; overflow: scroll;">

            <table class="table table-hover">
  <thead>
    <tr style="background-color: #4755AB;border-color: #4755AB;color:#ffffff;font-size: 15px;">
      <th scope="col">#</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Brand Logo</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    
    <?php $index = 1; ?>
    @foreach($brands as $brd)
    <tr style="font-size: 15px;">
      <th scope="row">{{$index}}</th>
      <td>{{$brd->brandName}}</td>
      <td>{{$brd->logo}}</td>
      <td>
      <a  href = "#" style="font-size: 20px;margin-right: 1em;" data-toggle="modal" 
    data-target="#editModal-{{$brd->id}}"  data-backdrop="static">
      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
      </a>
      <a href = "deleteBrand/{{$brd->id}}" style = "font-size: 20px;">
      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
      </svg>
      </a>
      </td>
     <?php $index++;?>
     </tr>

     <div class="modal fade" id="editModal-{{$brd->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h3>Edit Brand</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="updateBrand" method="post" style="text-align" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                    <input type="hidden" name="id" value="{{$brd->id}}" />
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control input-style" value="{{$brd->brandName}}" id="brandName" name="brandName"
                                    placeholder="Brand Name">
                            </div>
                            
                           
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-12">
                        <input class="form-control input-style" type="file" name="brandLogo" id="brandLogo" value="" class="span8 tip">
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary btn-style" value="submit"></input>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    </div>



    @endforeach
    
  </tbody>
</table>
</div>
</div>

<!-- form -->
            <div class="card card_border py-2 mb-4">
                <div class="cards__heading">
                    <h3>Manage Brand<span></span></h3>
                </div>
                <div class="card-body">
                    <form action="createBrand" method="post" style="text-align" enctype="multipart/form-data" >
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-style" id="brandName" name="brandName"
                                    placeholder="Brand Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                            <input class="form-control input-style" type="file" name="brandLogo" class="span8 tip" required>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary btn-style" value="submit"></input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@stop