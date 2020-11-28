@if ($paymentmodeid==1)
<table class="table table-striped table-bordered">
     <thead>
         <tr>
             <th>Payment Mode</th>
             <th>Account No.</th>
             <th>Ifsc Code</th>
             <th>Account Name</th> 
             
         </tr>
     </thead>
     <tbody>
        @foreach ($paymentOptions as $paymentOption) 
         <tr style="{{ $paymentOption->status==1?'background-color: #48a40d':'#6064600d' }}">
             <td>{{ $paymentOption->paymentMode->name or '' }}</td>
             <td>{{ $paymentOption->account_no }}</td>
             <td>{{ $paymentOption->ifsc_code }}</td>
             <td>{{ $paymentOption->account_name }}</td>
             
         </tr>
        @endforeach
     </tbody>
 </table> 
 @else
 <table class="table table-striped table-bordered">
     <thead>
         <tr>  
             <th>Account Name</th> 
             <th>QR Code</th> 
             
         </tr>
     </thead>
     <tbody>
        @foreach ($paymentOptions as $paymentOption) 
         <tr style="{{ $paymentOption->status==1?'background-color: #48a40d':'#6064600d' }}"> 
             <td>{{ $paymentOption->account_name }}</td>
             <td>{{ $paymentOption->account_name }}</td>
             
         </tr>
        @endforeach
     </tbody>
 </table> 
@endif
