<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 1/16/2021
 * Time: 2:32 AM
 */



namespace App\Helpers;
class Mysql
{
    private static $instance;

    /**
     *  Private constructor: prevents direct creation of object
     */


    /**
     *  Singleton method (only allow one instance of this class)
     *  @return object
     */

    public static function singleton()
    {
        if (!isset(self::$instance))
        {
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
    }  // end singleton()

    /**
     *  Prevent users from cloning this instance
     *  @return void
     */
    public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }
    public static function makeNumber2Text($numberValue){

        $textResult = ''; // so i can use .=
        $numberValue = "$numberValue";

        if($numberValue[0] == '-'){
            $textResult .= 'سالب ';
            $numberValue = substr($numberValue,1);
        }

        $numberValue = (int) $numberValue;
        $def = array(    "0" => 'صفر',
            "1" => 'واحد',
            "2" => 'اثنان',
            "3" => 'ثلاث',
            "4" => 'اربع',
            "5" => 'خمس',
            "6" => 'ست',
            "7" => 'سبع',
            "8" => 'ثمان',
            "9" => 'تسع',
            "10" => 'عشر',
            "11" => 'أحد عشر',
            "12" => 'اثنا عشر',
            "100" => 'مائة',
            "200" => 'مئتان',
            "1000" => 'ألف',
            "2000" => 'ألفين',
            "1000000" => 'مليون',
            "2000000" => 'مليونان');

        // check for defind values
        if(isset($def[$numberValue])) {
            // checking for numbers from 2 to 10 :reson = 2 to 10 uses 'ة' at the end
            if($numberValue < 11 && $numberValue > 2){
                if ($numberValue == 8 )
                    $textResult .= $def[$numberValue].'ية';
                else
                    $textResult .= $def[$numberValue].'ة';
            }
            else{
                // the rest of the defined numbers
                $textResult .= $def[$numberValue];
            }
        }
        else{
            $tensCheck = $numberValue%10;
            $numberValue = "$numberValue";

            for($x = strlen($numberValue); $x > 0; $x--){
                $places[$x] = $numberValue[strlen($numberValue)-$x];
            }

            switch(count($places)){
                case 2: // 2 numbers
                case 1: // or 1 number
                {
                    if ($places[1] == 8 )
                        $textResult .= ($places[1] != 0) ? $def[$places[1]].(($places[1] > 2 || $places[2] == 1) ? 'ية' : '').(($places[2] != 1) ? ' و' : ' ') : '';
                    else

                        $textResult .= ($places[1] != 0) ? $def[$places[1]].(($places[1] > 2 || $places[2] == 1) ? 'ة' : '').(($places[2] != 1) ? ' و' : ' ') : '';
                    $textResult .= (($places[2] > 2) ? $def[$places[2]].'ون' : $def[10].(($places[2] != 2) ? '' : 'ون'));
                }
                    break;
                case 3: // 3 numbers
                {
                    $lastTwo = (int) $places[2].$places[1];
                    $textResult .= ($places[3] > 2) ? $def[$places[3]].' '.$def[100] : $def[(int) $places[3]."00"];
                    if($lastTwo != 0){
                        $textResult .= ' و'.Mysql::makeNumber2Text($lastTwo);
                    }
                }
                    break;
                case 4: // 4 numbrs
                {
                    $lastThree = (int) $places[3].$places[2].$places[1];
                    $textResult .= ($places[4] > 2) ? $def[$places[4]].'ة الاف' : $def[(int) $places[4]."000"];
                    if($lastThree != 0){
                        $textResult .= ' و'.Mysql::makeNumber2Text($lastThree);
                    }
                }
                    break;
                case 5: // 5 numbers
                {
                    $lastThree = (int) $places[3].$places[2].$places[1];
                    $textResult .= Mysql::makeNumber2Text((int) $places[5].$places[4]).((((int) $places[5].$places[4]) != 10) ? ' الفاً' : ' الاف');
                    if($lastThree != 0){
                        $textResult .= ' و'.Mysql::makeNumber2Text($lastThree);
                    }
                }
                    break;
                case 6: // 6 numbers
                {
                    $lastThree = (int) $places[3].$places[2].$places[1];
                    $textResult .= Mysql::makeNumber2Text((int) $places[6].$places[5].$places[4]).((((int) $places[5].$places[4]) != 10) ? ' الفاً' : ' الاف');
                    if($lastThree != 0){
                        $textResult .= ' و'.Mysql::makeNumber2Text($lastThree);
                    }
                }
                    break;
                case 7: // 7 numbers 1 mill
                {
                    $textResult .= ($places[7] > 2) ? $def[$places[7]].' ملايين' : $def[(int) $places[7]."000000"];
                    $textResult .= ' و';
                    $textResult .= Mysql::makeNumber2Text((int) $places[6].$places[5].$places[4].$places[3].$places[2].$places[1]);
                }
                    break;
                case 8: // 8 numbers 10 mill
                case 9: // 9 numbers 100 mill
                {
                    $places[9] = (isset($places[9])) ? $places[9] : '';
                    $firstThree = (int) $places[9].$places[8].$places[7];
                    $textResult .=     Mysql::makeNumber2Text($firstThree);
                    $textResult .=    ($firstThree < 11) ? ' ملايين ' : ' مليونا ';
                    if(((int) $places[6].$places[5].$places[4].$places[3].$places[2].$places[1]) != 0){
                        $textResult .= ' و';
                        $textResult .=    Mysql::makeNumber2Text((int) $places[6].$places[5].$places[4].$places[3].$places[2].$places[1]);
                    }
                }
                    break;
                default:
                {
                    $textResult = 'هذا رقم كبير .. ';
                }
            }

        }
        return $textResult;

    }//end of function convert currency to sudanies pound.
    public static function Dot($Value){
        if(!isset($Value))
            return "لم يتم إدخال أى أرقام";
        $DotArray= array("","عشرة","مائة","ألف","عشرة ألاف","مائة ألف","مليون","عشرة ملايين","مائة مليون","مليار");

        $StrValue=(string)$Value;
        $DotLens=0;
        $Dot=False;
        $Text1="";
        $Text2="";

        for($i=0;$i<strlen($StrValue);$i++)
        {
            if($StrValue[$i]=="."){
                $Dot=True;
            }

            if($StrValue[$i]!="."){
                if($Dot==False){
                    //Ignore the comea form number of money.
                    if($StrValue[$i]!=",")
                        $Text1.=$StrValue[$i];


                }else{
                    $Text2.=$StrValue[$i];
                    $DotLens++;
                }
            }
        }//end of for loop.

        if($Dot==False)
            return Mysql::makeNumber2Text($StrValue)." جنيه " ;
        else {
            if($DotLens>0 && $DotLens<10)
                //Ignore Dot array return Mysql::makeNumber2Text((int)$Text1)." جنيه و ".Mysql::makeNumber2Text((int)$Text2)." ".$DotArray[$DotLens]." قرش ";

                return Mysql::makeNumber2Text((int)$Text1)." جنيه و ".Mysql::makeNumber2Text((int)$Text2)." "." قرش ";
            else
                return Mysql::makeNumber2Text((int)$Text1)." و ".Mysql::makeNumber2Text((int)$Text2)." قرش ";
        }
    }//end of function convert currency to sudanies pound.
}