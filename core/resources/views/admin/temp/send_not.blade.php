<?php
    $acts = App\Models\adminLog::orderby('id', 'desc')->paginate(50);
?>

<div class="sparkline9-list shadow-reset mg-tb-30">
    <div class="sparkline9-graph dashone-comment">
        <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
            <div class="row">
                <div class="col-sm-12" align="">
                   <form action="/admin/send/notification" method="post">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input id="msg_state" type="hidden" class="form-control" value="0" name="msg_state" required>
                                <label>{{ __('messages.subj') }}</label>
                                <input id="subject" type="text" class="form-control" name="subject" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.users') }}</label>
                                <input id="msg_users" name="msg_users" class="form-control" placeholder="{{ __('messages.usrs_sprt_by') }}" />
                                <span class="text-danger"><i>  </i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                               <input type="hidden" name="_token" value="{{csrf_token()}}">
                               <label>{{ __('messages.yr_msg') }}</label>
                               <textarea id="textmsg2" name="msg" class="form-control" required rows="15"></textarea>
                            </div>
                        </div>
                       <div class="form-group" align="center">
                          <br>
                           <button class="btn btn-info fa fa-paper-plane"> {{ __('messages.send_msg') }}</button>
                       </div>
                   </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $('#msg_state').val(0);
</script>
