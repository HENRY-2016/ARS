<?php
namespace App\Helpers;

use App\Models\CheckPointsModel;
use App\Models\User;

class GeneralHelper 
{
    public static function  getCurrentTime ()
    {
        date_default_timezone_set("Africa/Kampala");
        // Prints the day, date, month, year, time, AM or PM
        $currentTime = date("d-m-Y h:i:s A"); // get only hr and am /pm
        return $currentTime;
    }
    public static function  getTodaysDate ()
    {
        date_default_timezone_set("Africa/Kampala");
        // Prints the day, date, month, year, time, AM or PM
        $currentTime = date("l")." "." ".date("d-m-Y"); // get only hr and am /pm
        return $currentTime;
    }
    public static function  getShiftType ($action)
    {
        date_default_timezone_set("Africa/Kampala");

        $morningShiftHrs = array('06:am','07:am','08:am','09:am','10:am','11:am','12:pm','01:pm','02:pm');
        $eveningShitHrs = array('03:pm','04:pm','05:pm','06:pm','07:pm','08:pm','09:pm','10:pm','11:pm','12:am');
        $currentTime = date("h:a"); // get only hr and am /pm
    
        if ($action == 'View')
        {
            if (in_array($currentTime,$morningShiftHrs)){return  "Morning Shift";}
            if (in_array($currentTime,$eveningShitHrs)){return  "Evening Shift";}
            if (!(in_array($currentTime,$eveningShitHrs)) || !(in_array($currentTime,$morningShiftHrs)) ){return  "Out Of Working Hours";}
        }
        if ($action == 'Store')
        {
            if (in_array($currentTime,$morningShiftHrs)){return  "1";}
            if (in_array($currentTime,$eveningShitHrs)){return  "2";}
            if (!(in_array($currentTime,$eveningShitHrs)) || !(in_array($currentTime,$morningShiftHrs)) ){return  "0";}
        }
    }



    public static function  getUserName ($id)
    {
        $data = User ::where('id',$id)->get(['name']);
            $length = count ($data);
            if ($length == 0){return '';}
            else 
            {
                $name =  $data[0]["name"];
                return $name;
            }
    }
    
    public static function getCheckPointName ($id)
    {
        if ($id == 'Null'){return 'Null';}
        $data = CheckPointsModel::where('id',$id)->get(['name']);
            $length = count ($data);
            if ($length == 0){return '';}
            else 
            {
                $name =  $data[0]["name"];
                return $name;
            }
    }









}