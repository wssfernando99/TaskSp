<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Package;
use Exception;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function ViewDelivery(){

        $deliveries = Delivery::join('packages', 'deliveries.deliveryId', '=', 'packages.deliveryId')
            ->where('deliveries.isActive', 1)
            ->paginate(10);

        return view('viewAllDelivery', compact('deliveries'));

    }

    public function CreateView(){
        
        return view('createView');
    }

    public function ViewOneDelivery(){

        $id = '2';

        $delivery = Delivery::where('id', $id)->first();

        return view('viewOneDelivery',compact('delivery'));
    }

    public function CreateDelivery(Request $request){

        // try{

            $request->validate([

                'pAddress' => 'required',
                'pName' => 'required',
                'pPhone' => 'required | min:10 |max:10',
                'dName' => 'required',
                'dPhone' => 'required | min:10 |max:10',
                'dAddress' => 'required',
                'tOfGood' => 'required',
                'dProvider' => 'required',
                'priority' => 'required',
                'sPickDate' => 'required',
                'sPickTime' => 'required',
                'pDescription' => 'required',
                'weight' => 'required',
                'length' => 'required',
                'width' => 'required',
                'height' => 'required',
                'pEmail' => 'nullable | email',
                'dEmail' => 'nullable | email',
                
            ],[
                'pAddress.required' => 'Please enter your address',
                'pName.required' => 'Please enter your name',
                'pPhone.required' => 'Please enter your phone number',
                'pPhone.min' => 'Please enter a valid phone number',
                'pPhone.max' => 'Please enter a valid phone number',
                'dName.required' => 'Please enter the name of the recipient',
                'dPhone.required' => 'Please enter the phone number of the recipient',
                'dPhone.min' => 'Please enter a valid phone number',
                'dPhone.max' => 'Please enter a valid phone number',
                'dAddress.required' => 'Please enter the address of the recipient',
                'tOfGood.required' => 'Please select the type of goods',
                'dProvider.required' => 'Please select the delivery provider',
                'priority.required' => 'Please select the priority',
                'sPickDate.required' => 'Please enter the pickup date',
                'sPickTime.required' => 'Please enter the pickup time',
                'pDescription.required' => 'Please enter the description of the goods',
                'weight.required' => 'Please enter the weight of the goods',
                'length.required' => 'Please enter the length of the goods',
                'width.required' => 'Please enter the width of the goods',
                'height.required' => 'Please enter the height of the goods',
                'pEmail.email' => 'Please enter a valid email address',
                'dEmail.email' => 'Please enter a valid email address',
            ]);
    
            $deliveryId = uniqid();
    
            $delivery = new Delivery();
            $delivery->deliveryId = $deliveryId;
            $delivery->pAddress = $request->pAddress;
            $delivery->pName = $request->pName;
            $delivery->pPhone = $request->pPhone;
            $delivery->pEmail = $request->pEmail;
            $delivery->dName = $request->dName;
            $delivery->dPhone = $request->dPhone;
            $delivery->dAddress = $request->dAddress;
            $delivery->dEmail = $request->dEmail;
            $delivery->tOfGood = $request->tOfGood;
            $delivery->dProvider = $request->dProvider;
            $delivery->priority = $request->priority;
            $delivery->sPickDate = $request->sPickDate;
            $delivery->sPickTime = $request->sPickTime;
            $delivery->isActive = 1;
            $delivery->status = 1 ;
    
            $delivery->save();
    
            $package = new Package();
            $package->deliveryId = $deliveryId;
            $package ->pDescription = $request->pDescription;
            $package ->weight = $request->weight;
            $package ->length = $request->length;
            $package ->width = $request->width;
            $package ->height = $request->height;
            $package ->isActive = 1;
    
            $package->save();
    
            return redirect('/viewAllDelivery')->with('message', 'Delivery created successfully');

        // }catch (Exception $e) {

        //     return redirect()->back()->with('error','Something went wrong');

        // }
        
    
    }

    public function UpdateOrder(Request $request)
    {
        // dd($request->check, $request->id);

        $request->validate([
            'check' => 'required',
            'id' => 'required',
        ],[
            'check.required' => 'Please select an option',
            'id.required' => 'Please select an order',
        ]);
    
        $check = $request->check;
        $id = $request->id;
    
        if ($check == 'cancel') {
            Delivery::where('id', $id)->update(['status' => 0]);
        } elseif ($check == 'delivered') {
            Delivery::where('id', $id)->update(['status' => 3]);
        } elseif ($check == 'on') {
            Delivery::where('id', $id)->update(['status' => 2]);
        }
    
        return redirect('/viewAllDelivery')->with('message', 'Order updated successfully');
    }

    public function Delete(Request $request){

        
        Delivery::where('id', $request->id)->update([
            'isActive' => 0
        ]);

        return redirect('/viewAllDelivery')->with('message', 'Order deleted successfully');

    }

}

    


