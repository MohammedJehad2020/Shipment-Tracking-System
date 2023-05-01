<?php

use App\Models\Address;

function t($key)
{
    $lang = lang();
    $path = resource_path() . '/lang' . '/';

    $file = $path . $lang . '.json';

    if (!file_exists($file)) {
        $array[$key] = $key;
        file_put_contents($file, json_encode($array, JSON_UNESCAPED_UNICODE));
        return $key;
    } else {
        $strJsonFileContents = file_get_contents($file);
        $array = json_decode($strJsonFileContents, true);
        if (@$array[$key]) return $array[$key];
        $array[$key] = $key;
        file_put_contents($file, json_encode($array, JSON_UNESCAPED_UNICODE));
        return $key;
    }
}
function lang()
{
    return app()->getLocale();
}

function updateUserAddress($request)
{
    $address = Address::updateOrCreate(
        [
           'user_id' => $request->id,
        ],[
            'country_code' => $request->country_code,
            'state' => $request->state,
            'city' => $request->city,
            'street' => $request->street,
            'post_code' => $request->post_code,
        ], 
    );
    return $address;

}