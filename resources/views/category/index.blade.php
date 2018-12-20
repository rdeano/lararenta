@extends('customlayout.app')


@section('content')

  <div class="row">
      <div class="col-sm-12">
          <div class="page-header">
              <h3>{{ $categoryinfo[0]->name }}</h3>
          </div>


          @foreach($categoryitems as $categoryitem)
            <div class="col-sm-3">
                <img src="{{url('/storage/app/').'/'.$categoryitem->picture}}" style="width:100%;height:200px;" />
            </div>

            <div class="col-sm-9">
              <h5><b>Name:</b> {{ $categoryitem->name }}</h5>
              <p><b>Description:</b> {{ $categoryitem->description }}</p>
              <p><b>Status:</b> {{ ucfirst($categoryitem->item_status) }}</p>
              <p><b>Amount for rent daily:</b> {{ number_format($categoryitem->amount_for_rent,2) }}</p>
              <button class="btn btn-default" onclick="showOwnerInfoModal({{ $categoryitem->user_id }})"><i class="fa fa-user"></i> Owners Details</button>
            </div>

            <div class="clearfix"></div>
            <hr />
          @endforeach



      </div>
  </div>


  <!-- Add  Item Modal -->
  <!-- Modal -->
  <div class="modal fade" id="ownerInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Owners Information</h5>

        </div>

          <div class="modal-body">

              <div class="col-sm-3">
                  <img src= "{{ url('/storage/app/upload/default.png') }}"  style="width:100px;height:100px" id="ownerpicture"/>
              </div>
              <div class="col-sm-9">
                  <p><b>Name:</b> <span id="ownername"></span></p>
                  <p><b>Address:</b> <span id="owneraddr"></span></p>
                  <p><b>Contact Number:</b> <span id="ownercontactnum"></span></p>
                  <p><b>About Me:</b> <span id="ownerabout"></span></p>
              </div>
              <div class="clearfix"></div>
          </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>

@endsection
