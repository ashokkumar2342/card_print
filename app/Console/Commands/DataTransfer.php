<?php

namespace App\Console\Commands; 
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\DB;

class DataTransfer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:transfer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'data transfer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {  
        ini_set('max_execution_time', '7200');
        ini_set('memory_limit','999M');
        ini_set("pcre.backtrack_limit", "5000000");
        $datas = DB::connection('sqlsrv')->select("select AC_NO, PART_NO, SECTION_NO, SlNoInPart, C_House_no, C_House_No_V1, FM_Name_EN + ' ' + IsNULL(LastName_EN,'') as name_en, FM_Name_V1 + ' ' + isNULL(LastName_V1,'') as name_l, RLN_Type, RLN_FM_NM_EN + ' ' + IsNULL(RLN_L_NM_EN,'') as fname_en, RLN_FM_NM_V1 + ' ' + IsNULL(RLN_L_NM_V1,'') as FName_L, EPIC_No, GENDER, AGE, DOB, EMAIL_ID, MOBILE_NO from dataall where ac_no in (39,40,41) ");
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "card_print";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // mysqli_options($conn, MYSQLI_OPT_LOCAL_INFILE, true);
        // if (!$conn) {
        //   die("Connection failed: " . mysqli_connect_error());
        // }
        mysqli_set_charset($conn,"utf8");
        // $sql = "LOAD DATA LOCAL INFILE 'C:/Users/DELL/Downloads/card_print.txt' INTO TABLE `data_voters`;";
        // mysqli_query($conn, $sql);
        // echo mysqli_error($conn);
        // echo "New record created successfully";
        foreach ($datas as $key => $value) { 
       
            $name_l=str_replace('਍', '', $value->name_l);
            $name_e=str_replace('਍', '', $value->name_en);
            $f_name_e=str_replace('਍', '', $value->fname_en);
            $f_name_l=str_replace('਍', '', $value->FName_L);
          
            $house_e = str_replace('\\',' ', $value->C_House_no);
            $house_l = str_replace('\\',' ', $value->C_House_No_V1);
       
            $sql = "Insert Into `data_voters` (`ac_no`, `part_no`, `section`, `srno`, `hno_e`, `hno_l`, `name_e`, `name_l`, `relation`, `f_name_e`, `f_name_l`, `cardno`, `gender`, `age`, `dob`, `mobile`, `list_no`) Values ('$value->AC_NO', '$value->PART_NO', '$value->SECTION_NO', '$value->SlNoInPart', '$house_e', '$house_l', '$name_e', '$name_l', '$value->RLN_Type', '$f_name_e', '$f_name_l', '$value->EPIC_No', '$value->GENDER', '$value->AGE', '$value->DOB', '$value->MOBILE_NO', 1);";
            mysqli_query($conn, $sql);
            // if (mysqli_query($conn, $sql)) {
            //   echo "New record created successfully";
            // } else {
            //   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            // }
            }

            mysqli_close($conn); 
    }    
   
}
