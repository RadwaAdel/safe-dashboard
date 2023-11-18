<?php



if (!function_exists('SETTING_VALUE')) {
    function SETTING_VALUE($key = false)
    {
        return \App\Models\Settings::where('key', $key)->first()->value?:'';
    }

}

if (!function_exists('CountRequest')) {
    function CountRequest(): int
    {
        return count(array_filter(request()->all()));
    }

}


if (!function_exists('roundToTheNearestAnything')) {

function roundToTheNearestAnything($value, $roundTo)
{
//    return  ceil($value);
    return  ceil($value / $roundTo) * $roundTo;
}
}

if (!function_exists('slug_ar')) {
    function slug_ar($string, $separator = '-')
    {
        if (is_null($string)) {
            return "";
        }

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }

}

if (!function_exists('slug_en')) {
    function slug_en($string, $separator = '-')
    {
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $separator, preg_replace('/[^A-Za-z0-9-]+/', $separator, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $string))))), $separator));
        return $slug;
    }

}



if (!function_exists('GetProductName')) {
    function GetProductName(int $ProductId)
    {

        return \App\Models\Product::find($ProductId)->name;
    }

}

if (!function_exists('Labels')) {
    function Labels($type)

    {
       switch ($type){
           case 1:
               return 'bg-primary';
               break;
           case 2:
               return 'bg-success';
               break;
           case 3:
               return 'bg-danger';
               break;
           case 4:
               return 'bg-warning';
               break;
           case 5:
               return 'bg-info';
               break;
           default:
               return 'bg-info';
               break;
       }
    }

}




    if (!function_exists('GetEnums')) {

        function GetEnums($Enum_name)
        {
            $file_name = "\App\Enums\dashboard\setting\ShiftSettingType";
            $EumnName = str_replace("ShiftSettingType", $Enum_name, $file_name);
            return $EumnName::all();
        }
    }


if (!function_exists('SocialMedia')) {
    function SocialMedia()
    {
        return \App\Models\Settings::wherein('id',[22,23,24,25,26,27])->pluck('value','key')->toArray();
    }

}

if (!function_exists('GovernorateData')) {
    function GovernorateData($id)
    {
        return \App\Models\Governorate::find($id);
    }

}
