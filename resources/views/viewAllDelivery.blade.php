@extends('layout')
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
                      <a href="{{ url('/viewOne/'.$delivery->deliveryId) }}" class="btn btn-primary btn-sm">View details</a>
                      <a href="{{ url('/cancelOrder/'.$delivery->deliveryId) }}" class="btn btn-danger btn-sm">Cancel Order</a>
                    </td>
                  </tr>
                    
                  @endforeach
                  
              
                 
                </tbody>
              </table>
        </div>
    </div>
</div>