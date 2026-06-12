@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
    <div class="main-panel">
        <div class="content">
            @php($breadcome = __('messages.dep_with_flutter'))
            @php($page_info = __('messages.dep_with_flutter_desc'))
            @include('user.atlantis.main_bar2')
            <div class="page-inner mt--5 bg-white">                   
                <div id="prnt"></div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <div class="card-title text-primary">
                                        <img src="/img/razorpay.jpg" height="50px" />  
                                    </div>
                                    <div class="card-tools">                                            
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">                                      
                                    <div class="col-md-7">
                                        <div class="panel-body">
                                            <label class="text-danger">{{__('messages.dep_amt_usd' )}}</label>
                                            <div>1 USD = {{env('CONVERSION').' ('.env('CURRENCY').')'}}</div>
                                            <input id="rpay_dp_amt" type="number" class="form-control mt-2" name="amount" value="" />
                                            <button class="btn btn-primary mt-4" type="submit" id="rzp_button1">Pay Now</button>
                                            
                                            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                            <script>
                                                
                                                    $('#rzp_button1').on('click', function(e){
                                                        if($('#rpay_dp_amt').val() < {{env('MIN_DEPOSIT')}} || $('#rpay_dp_amt').val() > {{env('MAX_DEPOSIT')}})
                                                        {
                                                            alert("{{__('messages.min_max_dep_amt')}}");
                                                        }
                                                        else
                                                        {
                                                            var options = {
                                                                "key": "rzp_test_QSHnBcutxW6Z07", // Enter the Key ID generated from the Dashboard
                                                                "amount": $('#rpay_dp_amt').val()*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                                                "currency": "USD",
                                                                "name": "Acme Corp",
                                                                "description": "Test Transaction",
                                                                "image": "https://example.com/your_logo",
                                                                //"order_id": "12432435435464", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                                                                "callback_url": "{{route('rpay.rpay_confirm')}}?user_id='{{$user->id}}'&amt="+$('#rpay_dp_amt').val(),
                                                                "prefill": {
                                                                    "name": "Gaurav Kumar",
                                                                    "email": "vickfranks@gmail.com",
                                                                    "contact": "2347060650884"
                                                                },
                                                                "notes": {
                                                                    "address": "Razorpay Corporate Office"
                                                                },
                                                                "theme": {
                                                                    "color": "#3399cc"
                                                                }
                                                            };
                                                            var rzp1 = new Razorpay(options);
                                                            rzp1.open();
                                                            e.preventDefault();
                                                        // alert('here');
                                                        }
                                                    });
                                                
                                                
                                                
                                            </script>
                                                        
                                                        
                                            
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
@endSection
            