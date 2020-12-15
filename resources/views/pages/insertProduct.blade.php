@extends('layout.adminLayout')

@section('contentAdmin')
<script>
HTMLElement.prototype.hasClass = function(c){
    return this.className.split(" ").indexOf(c) > -1
}
function ChangeSubcategory(data)
{
    var mainElement = document.getElementById('mainCatValue');
    var subCatElement = document.getElementById('subCatValue');
 
    for (item of subCatElement.children)
    {
        var available = item.hasClass('Cat_'+ mainElement.value +'_check');

        if(available)
        {
            item.style.display = "block";
        }
        else
        {
            item.style.display = "none";
        }
    }
}

</script>

<br/><br/>
<div class="modal fade" id="createProdModel" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h3>Create Product</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="card-body">
                    <form action="createProduct" method="post" style="text-align"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                    <div class="form-group row">
                            <div class="col-sm-6">
                            <select required placeholder="Select" id="mainCatValue" onChange="ChangeSubcategory()"  name="categoryId" class="form-control input-style" value="0" >
                            <option style="color:gray;" value="" disabled selected>Category...</option>
                            @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->categryName}}</option> 
                            @endforeach
                            </select>
                            </div>
                    
                            <div class="col-sm-6">
                            <select required placeholder="Select" id="subCatValue"  name="subCategoryId" class="form-control input-style" value="0" >
                            <option style="color:gray;" value="" disabled selected>Sub Category...</option>
                            @foreach($subCategories as $subcat)
                                <option class="Cat_{{$subcat->categoryId}}_check" value="{{$subcat->id}}">{{$subcat->subCategryName}}</option> 
                            @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control input-style" id="productName" name="productName"
                                    placeholder="Name" required="">
                            </div>
                       
                            <div class="col-sm-6">
                            <select required placeholder="Select"  name="brandId" class="form-control input-style" value="0" >
                            <option style="color:gray;" value="" disabled selected>Brand...</option>
                            @foreach($brands as $brd)
                                <option value="{{$brd->id}}">{{$brd->brandName}}</option> 
                            @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="number" class="form-control input-style" id="price" name="price"
                                    placeholder="Price" required="">
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control input-style" id="quantity" name="quantity"
                                    placeholder="Quantity" required="">
                            </div>
                        
                            <div class="col-sm-4">
                                <input type="number" class="form-control input-style" id="discount" name="discount"
                                    placeholder="Discount" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <textarea class="form-control input-style" name="description" placeholder="Description" rows="3" required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input class="form-control input-style" type="file" name="image1" id="image1" class="span8 tip" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input class="form-control input-style" type="file" name="image2" id="image2" value="" class="span8 tip" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input class="form-control input-style" type="file" name="image3" id="image3" value="" class="span8 tip" required>
                            </div>
                        </div>                      
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary btn-style" value="submit" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="modal fade" id="fileProductModel" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h3>Upload Product Data File</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="card-body">
                        <form action="UploadProductFile" method="post" style="text-align"  enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                        
                            <div class="form-group row">
                                <div class="col-sm-12">
                                <input class="form-control input-style" type="file" name="productFile" id="productFile" class="span8 tip" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-primary btn-style"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    




    <div class="form-group row">
                            <div class="col-sm-12">

<button style="float:right;" class="btn btn-primary btn-style" type="button"  href = "#" style="font-size: 20px;margin-right: 1em;" data-toggle="modal" 
data-target="#fileProductModel"  data-backdrop="static">
<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>
Upload Product Excel
</button>


    <button style="float:right;margin-right:25px;" class="btn btn-primary btn-style" type="button"  href = "#" style="font-size: 20px;margin-right: 1em;" data-toggle="modal" 
    data-target="#createProdModel"  data-backdrop="static">
    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>
      Add Product
</button>


</div>
</div>


<!--Table-->
<div class="card card_border mb-4">
            <div class="cards__heading">
                    <h3>Products<span></span></h3>
                </div>
                <div class="card-body" style="max-height: 500px; overflow: scroll;">

            <table class="table table-hover">
  <thead>
    <tr style="background-color: #4755AB;border-color: #4755AB;color:#ffffff;font-size: 15px;">
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    
    <?php $index = 1; ?>
    @foreach($products as $pro)
    <tr style="font-size: 15px;">
      <th scope="row">{{$index}}</th>
      <td>{{$pro->subCategryName}}</td>
      <td>{{$pro->productName}}</td>
      <td>{{$pro->description}}</td>
      <td>{{$pro->price}}</td>
      <td>
      <a  href = "#" style="font-size: 20px;margin-right: 1em;" data-toggle="modal" 
    data-target="#editModal-{{$pro->id}}"  data-backdrop="static">
      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
      </a>
      <a href = "destroyProduct/{{$pro->id}}" style = "font-size: 20px;">
      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
      </svg>
      </a>
      </td>
     <?php $index++;?>
     </tr>

     <div class="modal fade" id="editModal-{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h3>Edit Product</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="updateProduct" method="post" style="text-align"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                    <input type="hidden" name="id" value="{{$pro->id}}" />
                    <div class="form-group row">
                            <div class="col-sm-6">
                            <select required placeholder="Select" id="mainCatValue" onChange="ChangeSubcategory()"  name="categoryId" class="form-control input-style" value="0" >
                            <option style="color:gray;" value="" disabled selected>Category...</option>
                            @foreach($category as $cat)
                                <option value="{{$cat->id}}" {{($cat->id) == ($pro->categoryId) ? 'selected' : '' }}>{{$cat->categryName}}</option> 
                            @endforeach
                            </select>
                            </div>
                    
                            <div class="col-sm-6">
                            <select required placeholder="Select" id="subCatValue"  name="subCategoryId" class="form-control input-style" value="0" >
                            <option style="color:gray;" value="" disabled selected>Sub Category...</option>
                            @foreach($subCategories as $subcat)
                                <option class="Cat_{{$subcat->categoryId}}_check" value="{{$subcat->id}}" {{($subcat->id) == ($pro->subCategoryId) ? 'selected' : '' }} >{{$subcat->subCategryName}}</option> 
                            @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control input-style" id="productName" name="productName"
                                    placeholder="Name" value="{{$pro->productName}}" required="">
                            </div>
                       
                            <div class="col-sm-6">
                            <select required placeholder="Select"  name="brandId" class="form-control input-style" value="0" >
                            <option style="color:gray;" value="" disabled selected>Brand...</option>
                            @foreach($brands as $brd)
                                <option value="{{$brd->id}}" {{($brd->id) == ($pro->brandId) ? 'selected' : '' }}>{{$brd->brandName}}</option> 
                            @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="number" class="form-control input-style" id="price" name="price"
                                    placeholder="Price" required="" value="{{$pro->price}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control input-style" id="quantity" name="quantity"
                                    placeholder="Quantity" required="" value="{{$pro->quantity}}">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-style" id="discount" name="discount"
                                    placeholder="Discount" value="{{$pro->discount}}" required="">
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <textarea class="form-control input-style" name="description"  placeholder="Product Description" rows="3" required="">{{$pro->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input class="form-control input-style" type="file" name="image1" id="image1" class="span8 tip" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input class="form-control input-style" type="file" name="image2" id="image2" value="" class="span8 tip" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input class="form-control input-style" type="file" name="image3" id="image3" value="" class="span8 tip" >
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

@stop