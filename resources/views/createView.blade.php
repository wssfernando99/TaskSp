@extends('layout')
@section('content')

<div class="container-fluid p-5">

<div class="row">
    <div class="col-md-12">

        <form action="{{ url('/createDelivery') }}" class="needs-validation" novalidate method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

                <div class="row">
                    <div class="mb-3">
                        <label class="form-label" for="">Pickup Address<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="pAddress" id="pAddress"/>
                        @error('pAddress')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Pickup name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="pName" id="pName"/>
                        @error('pName')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Pickup Contact No.<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="pPhone" id="pPhone"/>
                        @error('pPhone')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Pickup Email(Optional)</label>
                        <input type="email" class="form-control"  name="pEmail" id="pEmail"/>
                        @error('pEmail')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">delivery Address<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="dAddress" id="dAddress"/>
                        @error('dAddress')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">delivery Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="dName" id="dName"/>
                        @error('dName')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">delivery contact no.<span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="dPhone" id="dPhone"/>
                        @error('dPhone')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">delivery Email(optional).<span class="text-danger">*</span></label>
                        <input type="email" class="form-control"  name="dEmail" id="dEmail"/>
                        @error('dEmail')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <select class="form-control" name="tOfGood" id="tOfGood" >
                        <option value="">--Select Type of good--</option>
                        <option value="Document">document</option>
                        <option value="Parcel">Parcel</option>
                        
                    </select>
                    @error('tOfGood')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="dProvider" id="dProvider" >
                            <option value="">--Select delivery provider--</option>
                            <option value="DHL">DHL</option>
                            <option value="STARTRACK">STARTRACK</option>
                            <option value="ZOOM2U">ZOOM2U</option>
                            <option value="TGE">TGE</option>
                        </select>
                        @error('dProvider')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="priority" id="priority" >
                            <option value="">--Select Priority--</option>
                            <option value="standard">standard</option>
                            <option value="express">express</option>
                            <option value="immediate">immediate</option>
                        </select>
                        @error('priority')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">shipment Pickup date<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" placeholder="Enter Sheet Name" name="sPickDate" id="sPickDate"/>
                        @error('sPickDate')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">shipment Pickup time<span class="text-danger">*</span></label>
                        <input type="time" class="form-control" placeholder="Enter Sheet Name" name="sPickTime" id="sPickTime"/>
                        @error('sPickTime')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Package description<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Sheet Name" name="pDescription" id="pDescription"/>
                        @error('pDescription')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Length<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Sheet Name" name="length" id="length"/>
                        @error('length')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">height<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Sheet Name" name="height" id="height"/>
                        @error('height')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Width<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Sheet Name" name="width" id="width"/>
                        @error('width')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">weight<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Sheet Name" name="weight" id="weight"/>
                        @error('weight')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

          
           
                
                <button type="submit" class="btn btn-primary">Create Delivery</button>
        
        </form>
        
    </div>
</div>
</div>

@endsection