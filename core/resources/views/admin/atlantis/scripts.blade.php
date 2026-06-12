	<script src="/atlantis/main.js"></script>
	
	<script>
        tinymce.init({
            selector: '#textmsg2',

            setup: function (editor1) {
                editor1.on('change', function () {
                    editor1.save();
                });
            },            
	        plugins: [
	            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	            'searchreplace wordcount visualblocks visualchars code fullscreen',
	            'insertdatetime media nonbreaking save table contextmenu directionality',
	            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
	        ],
	        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
	        image_advtab: true,
        });
    </script>
	
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable();
		});
	</script>

	<script>
        $('#dsh_toggle').on('click', function(){
            $('#dash_logo').toggle();
            if($('#dash_logo').is(':visible'))
            {
                $('#dsh_toggle').addClass('ml_30px');
            }
            else
            {
                $('#dsh_toggle').removeClass('ml_30px');
            }
        });
    </script>
    <script>
        var tg = 0;
        $('#mlogo_toggle').on('click', function(){
            // $('#dash_logo').toggle();
            if(tg == 0)
            {
                // $('#dash_logo').hide();
                tg = 1;
            }
            else
            {
                // $('#dash_logo').show();
                tg = 0;
            }
        });

        $('.nav-link-nav').on('click', function(){
        	window.location.href = "/admin/home";
        });
    </script>



    <div id="err" class="alert alert-danger popup_alert_err" >
	</div>
	<div id="suc" class="alert alert-success popup_alert_suc">
	</div>

	@include('user.inc.alert')

	@if(Session::has('status')  && Session::get('msgType') == 'suc')         
	    <script type="text/javascript">            
	        $('#succ').show();
	    </script>
	    {{Session::forget('status')}}
	    {{Session::forget('msgType')}}         
	@elseif(Session::has('status')  && Session::get('msgType') == 'err')        
	    <script type="text/javascript">
	        $('#errr_msg').html('{{Session::get('status')}}');
	        $('#errr').show();
	    </script>
	    {{Session::forget('status')}}
	    {{Session::forget('msgType')}}
	@endif

	@if(Session::get('toast_type') == 'err' )
		<script type="text/javascript">
			$('#err').html('{{Session::get('toast_msg')}}')
            $('#err').show().animate({ width: "30%" }, "1000").delay(10000).fadeOut(100);
		</script>
	@endif
	@if(Session::get('toast_type') == 'suc' )
		<script type="text/javascript">
			$('#suc').html('{{Session::get('toast_msg')}}')
            $('#suc').show().animate({ width: "30%" }, "1000").delay(10000).fadeOut(100);
		</script>
	@endif
