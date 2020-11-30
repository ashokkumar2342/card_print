
<table class="table table-striped table-bordered" id="report-table">
     <thead>
         <tr>
             <th>Date</th>
             <th>Remarks</th>
             <th>Credit Amount</th>
             <th>Debit Amount</th>
             <th>Balance</th>
             <th>Status</th>
         </tr>
     </thead>
     <tbody>
        @foreach ($cashbooks as $cashbook) 
         <tr>            
             <td>{{ date('d-m-Y',strtotime($cashbook->transaction_date_time)) }}</td>
             <td>{{ $cashbook->remarks }}</td>
             <td>{{ $cashbook->camount }}</td>
             <td>{{ $cashbook->damount }}</td>
             <td>{{ $cashbook->balanceamt }}</td>             
             <td>{{ $cashbook->tstatus }}</td>             
             
         </tr>
        @endforeach
     </tbody>
 </table> 
 
