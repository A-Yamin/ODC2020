<?php

namespace common\helpers;

class UserHelper
{

    public static function getDisreict($id)
    {
        $discrict = json_decode(json_decode(file_get_contents('https://pm.gov.uz/oz/api/enums/get-districts?region_id='.$id)));
        $element = '';
        foreach ($discrict as $item) {
            $element .= "<option value='$item->id'>$item->title</option>";
        }

        return $element;
    }

    public static function getMahalla($region_id,$district_id)
    {
        $discrict = json_decode(json_decode(file_get_contents('https://pm.gov.uz/oz/api/enums/get-mahalla?region_id='.$region_id.'&district_id='.$district_id)));
        $element = '';
        foreach ($discrict as $item) {
            $element .= "<option value='$item->id'>$item->title</option>";
        }

        return $element;
    }
}