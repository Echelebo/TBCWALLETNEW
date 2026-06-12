
            <table class="new_table table-stripped table-hover">
                <thead>
                    <tr>
                       <th> {{ __('messages.adm_name') }} </th>
                       <th> {{ __('messages.pkg_min') }} </th>
                       <th> {{ __('messages.pkg_max') }} </th>
                       <th> {{ __('messages.intrs_precnt') }} </th>
                       <th> {{ __('messages.perd') }} </th>
                       <!-- <th> {{ __('messages.mthd') }} </th> -->
                       <th> {{ __('messages.wd_interval') }} </th>                       
                       <th> {{ __('messages.on_off') }} </th>
                       <th> {{ __('messages.mang') }} </th>                                                                          
                    </tr>
                </thead>
                <tbody>
                    
                    @if(count($packs) > 0 )
                        @foreach($packs as $dep)
                            <tr>
                                <td><b>{{$dep->package_name}}</b></td>
                                <td>
                                    {{$dep->min}}
                                </td>
                                <td>
                                    {{$dep->max}}
                                </td>
                                <td>
                                    {{round($dep->daily_interest*$dep->period*100,2)}}
                                </td>
                                <td>
                                    {{$dep->period}}
                                    @if($dep->method == 1)
                                        {{ __('messages.wrk_days') }}
                                    @elseif($dep->method == 0)
                                        {{ __('messages.everyday') }}
                                    @endif
                                </td>                                
                                <td>
                                    {{$dep->days_interval}}
                                </td>                                
                                <td>                                     
                                  <label class="switch" >
                                    <input type="checkbox" @if($dep->status == 1){{'checked'}}@endif>
                                    <span id="switch_pack{{$dep->id}}" class="slider round" onclick="act_deact_pack('{{$dep->id}}')"></span>
                                  </label>                                    
                                </td>
                                
                                <td> 
                                    <div class="dropdown show">
                                        <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-circle-ellipsis fa-2x text-primary"></i>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            @if($adm->role == 3 || $adm->role == 2)
                                                <a class="dropdown-item" id="{{$dep->id}}" title="Edit Package" href="javascript:void(0)" onclick="edit_pack(this.id, '{{$dep->min}}', '{{$dep->max}}', '{{round($dep->daily_interest*$dep->period*100,2)}}', '{{$dep->withdrwal_fee}}', '{{csrf_token()}}', '{{$dep->currency}}')"> 
                                                    <span><i class="fa fa-edit text-primary"></i> Edit</span>
                                                </a> 
                                                <a class="dropdown-item" id="{{$dep->id}}" title="Delete Package" href="javascript:void(0)" onclick="load_get_ajax('/admin/delete/pack/{{$dep->id}}', this.id, 'admDeleteMsg') "> 
                                                    <span><i class="fa fa-times text-danger"></i> Delete</span>
                                                </a>
                                            @endif                                       
                                        </div>
                                    </div>                                                                       
                                   
                                </td>
                                               
                            </tr>
                        @endforeach
                    @else
                        
                    @endif
                </tbody>
            </table>
<div class="mt-5"></div>