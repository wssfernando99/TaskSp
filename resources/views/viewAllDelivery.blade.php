@extends('layout').


@section('content')

<div class="container-fluid p-5">



    <div class="row">

      <div class="col-md-12 mb-3">
        <a href="{{ url('/createView') }}" class="btn btn-primary">Create Delivery</a>
      </div>

      @if (session()->has('message'))
          <div class="col-md-4">
            <div class="alert alert-success alert-dismissible" role="alert">
                <h6 class="alert-heading d-flex align-items-center mb-1">Completed:</h6>
                <p class="mb-0">{{ session()->get('message') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
          </div>
      @endif

      @foreach ($errors->all() as $error)
          <div class="col-md-4">
              <div class="alert alert-danger alert-dismissible" role="alert">
                  <h6 class="alert-heading d-flex align-items-center mb-1">Error!!</h6>
                    <p class="mb-0">{{ $error }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
              </div>
            </div>
      @endforeach

        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">deliveryId</th>
                    <th scope="col">pickup address</th>
                    <th scope="col">pickup contact</th>
                    <th scope="col">delivery address</th>
                    <th scope="col">delivery contact</th>
                    <th scope="col">type of goods</th>
                    <th scope="col">delivery provide</th>
                    <th scope="col">priority</th>
                    <th scope="col">shipment Pickup date</th>
                    <th scope="col">Shipment pickup time</th>
                    <th scope="col">Status</th>
                    <th scope="col">action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($deliveries as $delivery)

                  <tr>
                    <td>{{ $delivery->deliveryId }}</td>
                    <td>{{ $delivery->pAddress }}</td>
                    <td>{{ $delivery->pPhone }}</td>
                    <td>{{ $delivery->dAddress}}</td>
                    <td>{{ $delivery->dPhone}}</td>
                    <td>{{ $delivery->tOfGood}}</td>
                    <td>{{ $delivery->dProvider}}</td>
                    <td>{{ $delivery->priority}}</td>
                    <td>{{ $delivery->sPickDate}}</td>
                    <td>{{ $delivery->sPickTime}}</td>
                    <td>
                      @if($delivery->status == 0)
                      <span class="badge bg-warning">canceled</span>
                      @elseif($delivery->status == 1)
                      <span class="badge bg-success">Pending</span>
                      @elseif($delivery->status == 2)
                      <span class="badge bg-primary">On the way</span>
                      @elseif($delivery->status == 3)
                      <span class="badge bg-info">Delivered</span>
                      @endif
                    </td>
                    <td> 
                      <a href="{{ url('/viewDelivery' . $delivery->id)  }}" class="btn btn-primary btn-sm">All Details</a>
                      <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#edit-modal" data-id="{{ $delivery->id }}">update</button>
                      <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-modal" data-id="{{ $delivery->id }}">Delete</button>
                    </td>
                  </tr>
                    
                  @endforeach
                  
              
                 
                </tbody>
              </table>
              {{ $deliveries->links() }}
        </div>
    </div>
</div>

 
<div class="modal fade" id="edit-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Update Status</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ url('/updateOrder') }}" class="needs-validation" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-body">
                  <input type="text" class="form-control" id="id" name="id" hidden/>
                  <div class="row">
                      <div class="mb-3">
                          <label class="form-label" for="sheetName">
                              Update delivery <span class="text-danger">*</span>
                          </label>
                          <select class="form-control" name="check" id="check" required>
                              <option value="">--Select Option--</option>
                              <option value="cancel">Cancel Order</option>
                              <option value="delivered">Delivered</option>
                              <option value="on">On the way</option>
                          </select>
                          @error('check')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      Close
                  </button>
                  <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
          </form>

          
      </div>
  </div>
</div>

<div class="modal fade" id="delete-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Delete Order</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ url('/delete') }}" class="needs-validation" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-body">
                  <input type="text" class="form-control" id="id" name="id" hidden/>
                  <div class="row">
                      <div class="mb-3">
                          <h5 >Are you sure you want to delete this order?</h5>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      No
                  </button>
                  <button type="submit" class="btn btn-primary">Yes</button>
              </div>
          </form>

          
      </div>
  </div>
</div>


{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script>
  $(document).ready(function() {

  console.log('sds');
      $('#edit-modal').on('show.bs.modal', function(event) {
          let button = $(event.relatedTarget);
          let id = button.data('id');


          let modal = $(this);
          modal.find('.modal-body #id').val(id);
      });
  });
</script>

<script>
  $(document).ready(function() {

  console.log('sds');
      $('#delete-modal').on('show.bs.modal', function(event) {
          let button = $(event.relatedTarget);
          let id = button.data('id');


          let modal = $(this);
          modal.find('.modal-body #id').val(id);
      });
  });
</script>



@endsection

