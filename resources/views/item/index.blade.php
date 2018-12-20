@extends('customlayout.app')


@section('content')

@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div> <br />
@endif



<div class="row">

  <div class="col-sm-12">

  <div class="page-header">
    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#addItemModal"><i class="fa fa-plus"></i> Add New Item</a>
  </div>


<table class="table table-striped">
    <thead>
        <th></th>
        <th>Category</th>
        <th>Name</th>
        <th>Description</th>
        <th>Amount for rent</th>
        <th>Item Status</th>
        <th>Action</th>
    </thead>

    <tbody>
        @foreach($items as $item)
            <tr>
                <td><img src="{{url('/storage/app')}}{{'/'.$item->picture}}" style="width:50px;50px;  " /></td>
                <td>{{ $item->categoryname }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td  >
                <td>{{ number_format($item->amount_for_rent,2) }}</td>
                <td>{{ $item->item_status }}</td>
                <td>
                    <ul style="list-style-type:none;padding-left:0">
                      <li><a href="#" class="btn btn-primary" onclick="showEditItemModal({{ $item->id }})"><i class="fa fa-edit"></i> Edit</a></li>
                      <li style="margin-top:5px">
                        <form action="{{ route('item.destroy', ['id' => $item->id] ) }}" method="POST" style="display:inline-block;">
          							{{method_field('DELETE')}}
           							{!! csrf_field() !!}

          							<input type="submit" value="Delete" class="btn btn-danger" />

          						</form>


                        <!-- <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a> -->

                      </li>
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>




<!-- Add  Item Modal -->
<!-- Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Item</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
        	{{ csrf_field() }}

        <div class="modal-body">
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category">
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                    <!-- <option value="">Electrical</option>
                    <option value="">Construction</option> -->
                </select>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" />
            </div>

            <div class="form-group">
              <label for="desc">Description</label>
              <textarea class="form-control" id="desc" name="desc" style="height:150px;">

              </textarea>
            </div>

            <div class="form-group">
                <label for="amountforrent">Amount for Rent</label>
                <input type="text" class="form-control" name="amountforrent" id="amountforrent" />
            </div>

            <div class="form-group">
                <label for="picture">Picture</label>
                <input type="file" name="picture" id="picture" / >
            </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="action" value="addnewitem" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>




<!-- Edit Item Modal -->
<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <form action="updateQuery" method="POST" enctype="multipart/form-data">

      	{{ csrf_field() }}

        <div class="modal-body">
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="editcategory" name="category">
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                    <!-- <option value="">Electrical</option>
                    <option value="">Construction</option> -->
                </select>
            </div>

            <div class="form-group">
                <label for="edititemname">Name</label>
                <input type="text" class="form-control" name="name" id="edititemname" />
            </div>

            <div class="form-group">
              <label for="edititemdesc">Description</label>
              <textarea class="form-control" id="edititemdesc" name="desc" style="height:150px;">

              </textarea>
            </div>

            <div class="form-group">
                <label for="edititemamountforrent">Amount for Rent</label>
                <input type="text" class="form-control" name="amountforrent" id="edititemamountforrent" />
            </div>

            <div class="form-group">
                <label for="edititempicture">Picture</label>
                <div style="margin-bottom:20px;">
                    <img id="edititempictureimg" style="width:100px;height:100px;" />
                </div>
                <input type="file" name="picture" id="edititempicture" / >
            </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="itemid" id="edititemid" />
          <input type="hidden" name="action" value="updateitem" id="edititemaction" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>



</div>

</div>

@endsection
