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
                      <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#view-modal" data-id="{{ $delivery->id }}"
                        data-deliveryid="{{ $delivery->deliveryId }}" data-paddress="{{ $delivery->pAddress }}"
                        data-pname="{{ $delivery->pName }}" data-pphone="{{ $delivery->pPhone }}"
                        data-pemail="{{ $delivery->pEmail }}" data-daddress="{{ $delivery->dAddress }}"
                        data-dname="{{ $delivery->dName }}" data-dphone="{{ $delivery->dPhone }}"
                        data-demail="{{ $delivery->dEmail }}" data-tofgood="{{ $delivery->tOfGood }}"
                        data-dprovider="{{ $delivery->dProvider }}" data-priority="{{ $delivery->priority }}"
                        data-spickdate="{{ $delivery->sPickDate }}" data-spicktime="{{ $delivery->sPickTime }}"
                        data-pdescription="{{ $delivery->pDescription }}" data-weight="{{ $delivery->weight }}"
                        data-length="{{ $delivery->length }}" data-width="{{ $delivery->width }}"
                        data-height="{{ $delivery->height }}">All Details</button>
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

<div class="modal fade" id="view-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">All Details of Delivery ID <span class="text-b" id="deliveryId"></span></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
              <div class="modal-body">

                <div class="row">
                  <h4>Pick Up Details</h4>
                  <div class="col-md-6"><h5>PickUp Address :<span id="pAddress"></span></h5></div>
                  <div class="col-md-6"><h5>PickUp Name :<span id="pName"></span></h5></div>
                  <div class="col-md-6"><h5>PickUp Contact :<span id="pPhone"></span></h5></div>
                  <div class="col-md-6"><h5>PickUp Email :<span id="pEmail"></span></h5></div>
                </div>

                <hr>

                <div class="row">
                  <h4>Delivery Details</h4>
                  <div class="col-md-6"><h5>Delivery Address :<span id="dAddress"></span></h5></div>
                  <div class="col-md-6"><h5>Delivery Name :<span id="dName"></span></h5></div>
                  <div class="col-md-6"><h5>Delivery Contact :<span id="dPhone"></span></h5></div>
                  <div class="col-md-6"><h5>Delivery Email :<span id="dEmail"></span></h5></div>
                </div>

                <hr>

                <div class="row">
                  <h4>Other Details</h4>
                  <div class="col-md-6"><h5>Type of good :<span id="tOfGood"></span></h5></div>
                  <div class="col-md-6"><h5>Delivery Provider :<span id="dProvider"></span></h5></div>
                  <div class="col-md-6"><h5>Priority :<span id="priority"></span></h5></div>
                  <div class="col-md-6"><h5>Shipment pickUp date :<span id="sPickDate"></span></h5></div>
                  <div class="col-md-6"><h5>Shipment pickUp Time :<span id="sPickTime"></span></h5></div>
                </div>

                <hr>

                <div class="row">
                  <h4>Package Details</h4>
                  <div class="col-md-6"><h5>Package Description :<span id="pDescription"></span></h5></div>
                  <div class="col-md-6"><h5>Length :<span id="length"></span></h5></div>
                  <div class="col-md-6"><h5>Height :<span id="height"></span></h5></div>
                  <div class="col-md-6"><h5>Width :<span id="width"></span></h5></div>
                  <div class="col-md-6"><h5>Weight :<span id="weight"></span></h5></div>
                </div>
                  
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                      Close
                  </button>
                  
              </div>
      

          
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

<script>
  $(document).ready(function() {

  console.log('sds');
      $('#view-modal').on('show.bs.modal', function(event) {
          let button = $(event.relatedTarget);
          let id = button.data('id');
          let deliveryid = button.data('deliveryid');
          let pAddress = button.data('paddress');
          let pName = button.data('pname');
          let pPhone = button.data('pphone');
          let pEmail = button.data('pemail');
          let dAddress = button.data('daddress');
          let dName = button.data('dname');
          let dPhone = button.data('dphone');
          let dEmail = button.data('demail');
          let tOfGood = button.data('tofgood');
          let dProvider = button.data('dprovider');
          let priority = button.data('priority');
          let sPickDate = button.data('spickdate');
          let sPickTime = button.data('spicktime');
          let pDescription = button.data('pdescription');
          let weight = button.data('weight');
          let length = button.data('length');
          let width = button.data('width');
          let height = button.data('height');


          let modal = $(this);
          modal.find('.modal-body #id').text(id);
          modal.find('.modal-header #deliveryId').text(deliveryid);
          modal.find('.modal-body #pAddress').text(pAddress);
          modal.find('.modal-body #pName').text(pName);
          modal.find('.modal-body #pPhone').text(pPhone);
          modal.find('.modal-body #pEmail').text(pEmail);
          modal.find('.modal-body #dAddress').text(dAddress);
          modal.find('.modal-body #dName').text(dName);
          modal.find('.modal-body #dPhone').text(dPhone);
          modal.find('.modal-body #dEmail').text(dEmail);
          modal.find('.modal-body #tOfGood').text(tOfGood);
          modal.find('.modal-body #dProvider').text(dProvider);
          modal.find('.modal-body #priority').text(priority);
          modal.find('.modal-body #sPickDate').text(sPickDate);
          modal.find('.modal-body #sPickTime').text(sPickTime);
          modal.find('.modal-body #pDescription').text(pDescription);
          modal.find('.modal-body #weight').text(weight);
          modal.find('.modal-body #length').text(length);
          modal.find('.modal-body #width').text(width);
          modal.find('.modal-body #height').text(height);
      });
  });
</script>



@endsection

