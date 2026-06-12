<?php


    function getWorkingDays($startDate, $endDate)
    {        
        $begin = strtotime($startDate)+86400;
        $end   = strtotime($endDate);
        if ($begin > $end) 
        {
            // echo "startdate is in the future! <br />";
            return 0;
        } 
        else 
        {
            $no_days  = 0;
            $weekends = 0;
            while ($begin <= $end) 
            {
                $no_days++; // no of days in the given interval      
                $what_day = date("N", $begin);
                if ($what_day > 5) { // 6 and 7 are weekend days
                   $weekends++;
                   // echo $what_day;
                };               
                $begin += 86400;   // +1 day                 
            };
            $working_days = $no_days - $weekends;
            return $working_days;
        }
    }
    
    function getDays($startDate, $endDate)
    {        
        $begin = strtotime($startDate)+86400;
        $end   = strtotime($endDate);
        if ($begin > $end) 
        {
            // echo "startdate is in the future! <br />";
            return 0;
        } 
        else 
        {
            $no_days  = 0;
            $weekends = 0;
            while ($begin <= $end) 
            {
                $no_days++; // no of days in the given interval      
                $what_day = date("N", $begin);
                if ($what_day > 5) { // 6 and 7 are weekend days
                   $weekends++;
                   // echo $what_day;
                };               
                $begin += 86400;   // +1 day                 
            };
            // $working_days = $no_days - $weekends;
            return $no_days;
        }
    }

    function search_user()
    {

        $v = Session::get('val');
        $users_table = App\Models\kyc::where('username', 'like', '%'.$v.'%')->orderby('id', 'desc')->paginate(100);
        Session::forget('val');
        return $users_table;
        
    }

    function search_deposit()
    {

        if(Session::has('val'))
        {
            $v = Session::get('val');
            $deps = App\Models\deposits::where('user_id', 'like', '%'.$v.'%')->orwhere('usn', 'like', '%'.$v.'%')->orwhere('amount', 'like', '%'.$v.'%')->orwhere('bank', 'like', '%'.$v.'%')->orwhere('account_no', 'like', '%'.$v.'%')->orwhere('account_name', 'like', '%'.$v.'%')->orwhere('status', 'like', '%'.$v.'%')->orwhere('created_at', 'like', '%'.$v.'%')->orderby('id', 'desc')->paginate(100);
            Session::forget('val');
        }
        else
        {
            $deps = App\Models\deposits::orderby('id', 'desc')->paginate(50);
        }
        return $deps;
        
    }

    function search_pack()
    {

        if(Session::has('val'))
        {
            $v = Session::get('val');
            $packs = App\Models\packages::where('user_id', $v)->orwhere('amount', $v)->orwhere('bank', $v)->orwhere('account_no', $v)->orwhere('account_name', $v)->orwhere('status', $v)->orwhere('created_at', 'like', '%'.$v.'%')->orderby('id', 'asc')->paginate(100);
            Session::forget('val');
        }
        else
        {
            $packs = App\Models\packages::orderby('id', 'asc')->paginate(100);
        }
        return $packs;
        
    }

    function search_adm()
    {

        if(Session::has('val'))
        {
            $v = Session::get('val');
            $adm_users = App\Models\admin::where('id', $v)->orwhere('email', $v)->orwhere('name', $v)->orwhere('role', $v)->orwhere('status', $v)->orwhere('created_at', 'like', '%'.$v.'%')->orderby('id', 'asc')->paginate(100);
            Session::forget('val');
        }
        else
        {
            $adm_users = App\Models\admin::orderby('id', 'asc')->paginate(100);
        }
        return $adm_users;
        
    }

    function search_users()
    {

        if(Session::has('val'))
        {
            $v = Session::get('val');
            $users_table = App\Models\User::where('id', $v)->orwhere('firstname', 'like', '%'.$v.'%')->orwhere('lastname', 'like', '%'.$v.'%')->orwhere('email', 'like', '%'.$v.'%')->orwhere('phone', 'like', '%'.$v.'%')->orwhere('status', 'like', '%'.$v.'%')->orwhere('username', 'like', '%'.$v.'%')->orwhere('created_at', 'like', '%'.$v.'%')->orderby('id', 'desc')->paginate(100);
            Session::forget('val');
        }
        else
        {
            $users_table = App\User::orderby('id', 'desc')->paginate(100);
        }
        return $users_table;
        
    }

    function search_withdrawal()
    {

        if(Session::has('val'))
        {
            $v = Session::get('val');
            $wd = App\Models\withdrawal::where('user_id', 'like', '%'.$v.'%')->orwhere('usn', 'like', '%'.$v.'%')->orwhere('amount', 'like', '%'.$v.'%')->orwhere('status', 'like', '%'.$v.'%')->orwhere('created_at', 'like', '%'.$v.'%')->orwhere('account', 'like', '%'.$v.'%')->orderby('id', 'desc')->paginate(100);
            Session::forget('val');
        }
        else
        {
            $wd = App\Models\withdrawal::orderby('id', 'desc')->paginate(100);
        }
        return $wd;
        
    }
        

    function user_details_data($id)
    {

        $adm = Session::get('adm');
        $adm = App\Models\admin::find($adm->id);
        Session::put('adm', $adm);  

        // $users = App\Models\User::orderby('id', 'desc')->get();
        $user = App\User::find($id);
        $inv = App\Models\investment::orderby('id', 'desc')->get();
        $deposits = App\Models\deposits::orderby('id', 'desc')->get();
        $wd = App\Models\withdrawal::orderby('id', 'desc')->get();

        $today_wd = App\Models\withdrawal::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
        $today_dep = App\Models\deposits::where('created_at','like','%'.date('Y-m-d').'%')->orderby('id', 'desc')->get();
        $today_inv = App\Models\investment::where('date_invested', date('Y-m-d'))->orderby('id', 'desc')->get();
         
        $logs =  App\Models\adminLog::orderby('id', 'desc')->get();
        $dt=$user->created_at;

        return ['user' => $user, 'dt' => $dt];
        
    }

    function get_ref_set()
    {
        $ref_set =  App\Models\ref_set::all();
        return $ref_set;
    }

    function load_db_tables($host, $db_user, $db_pwd, $db_name, $req_username, $req_pass, $req_site_name, $req_site_descr)
    {
        $mysqli = new mysqli($host, $db_user, $db_pwd, $db_name);
        $mysqli->begin_transaction();
        $sql = file_get_contents(storage_path('/app/mx_db.sql'));
        $sql .= "\n\nUPDATE admin SET email='".$req_username."', pwd='".$req_pass."' WHERE id=000001 ;";
        $sql .= "\n\nUPDATE settings SET site_descr='".$req_site_descr."', site_title='".$req_site_name."' WHERE id=1 ;";
        $rst = $mysqli->multi_query($sql);
        if (!$rst) {
            return 'Error migrating database';
        }
        do {
            $result = $mysqli->use_result();
            if ($result) {
                // process the results here
                $result->free();
            }
        } while ($mysqli->next_result());
        $mysqli->store_result(); // To fetch the error as exception
        
        $mysqli->commit();
        
        return 'suc';    
    }

    function update_db_tables($host, $db_user, $db_pwd, $db_name) {
        $mysqli = new mysqli($host, $db_user, $db_pwd, $db_name);
        $mysqli->begin_transaction();
        $sql = file_get_contents(storage_path('/app/update.sql'));
        $rst = $mysqli->multi_query($sql);
        if (!$rst) {
            return 'Error migrating database';
        }
        do {
            $result = $mysqli->use_result();
            if ($result) {
                // process the results here
                $result->free();
            }
        } while ($mysqli->next_result());
        $mysqli->store_result(); // To fetch the error as exception
        
        $mysqli->commit();
        
        return 'suc';   
    }

    function get_list_lang()
    {
        $dir    = resource_path('lang');
        $files2 = array_diff(scandir($dir), array('..', '.', 'vendor'));
        $locale = array();
        foreach($files2 as $key => $fl)
        {
            if(is_dir($dir.'/'.$fl))
            {
                $locale[$key] = $fl;
            }
        }
             
        return $locale;
    }
    
