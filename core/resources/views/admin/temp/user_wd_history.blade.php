<table id="basic-datatables-w" class="table table-stripped table-hover">
    <thead>
        <tr>               
            <th> {{ __('messages.actn') }} </th>
            <th> {{ __('messages.amnt') }} </th>                
            <th> {{ __('messages.date') }} </th>                                                    
        </tr>
    </thead>
    <tbody>
        <?php
            $activities = App\Models\Withdrawal::where('user_id', $user->id)->orderby('id', 'desc')->get();
        ?>
        @if(count($activities) > 0 )
            @foreach($activities as $activity)
                <tr> 
                    <td>{{$activity->account}}</td>
                    <td>{{$activity->amount}}</td>
                    <td>{{$activity->created_at}}</td>                     
                </tr>
            @endforeach
        @else
            
        @endif
    </tbody>
</table>