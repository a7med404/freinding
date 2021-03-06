<?php

function date_string($old_date) {
    //'Y-m-d H:i:s',
//    $old_date = date('l, F d y h:i:s');              // returns Saturday, January 30 10 02:06:34
    $old_date_timestamp = strtotime($old_date);
    $new_date = date('l,d Y', $old_date_timestamp);
    return $new_date;
}

function Time_Elapsed_String($datetime, $lang = "", $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    if ($lang == "ar" || $lang == "Arabic" || $lang == "arabic") {
        $string = array(
            'y' => 'سنة',
            'm' => 'شهر',
            'w' => 'أسبوع',
            'd' => 'يوم',
            'h' => 'ساعة',
            'i' => 'دقيقة',
            's' => 'ثانية',
        );
    } else {
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
    }
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            if ($lang == "ar" || $lang == "Arabic" || $lang == "arabic") {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            }
        } else {
            unset($string[$k]);
        }
    }
    if (!$full)
        $string = array_slice($string, 0, 1);
    if ($lang == "ar" || $lang == "Arabic" || $lang == "arabic") {
        return $string ? 'منذ ' . implode(', ', $string) : 'الآن';
    } else {
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}

function GetSize_Image($source_url, $width, $height) {
    if (!empty($source_url)) {
        $allimg_new = explode('uploads', $source_url);
        $img_new = explode('.', $allimg_new[1]);
        $value_new_image = $allimg_new[0] . 'uploads/thumbs' . $img_new[0] . '-w-' . $width . '-h-' . $height . '.' . $img_new[1];
        return $value_new_image;
    } else {
        return $source_url;
    }
}

function Compress_ImageSquare($source_url) {
    if (@getimagesize($source_url)) {
        $img_new = explode('.', $source_url);
//        $destination_url = $img_new[0] . '_compress.' . $img_new[1];
        $info = getimagesize($source_url);
        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source_url);
        } elseif ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($source_url);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($source_url);
        }
        list($width_min, $height_min) = getimagesize($source_url);
        $quality = 100;
        $new_width_min = $width_min;
        $new_height_min = $height_min;
        if ($new_width_min < $new_height_min) {
            $new_height_min = $new_width_min;
        }
        if ($new_height_min < $new_width_min) {
            $new_width_min = $new_height_min;
        }
        if ($new_height_min >= 1000 || $new_height_min >= '1000') {
            $new_width_min = $new_height_min = 500;
        }
        $source_min = imagecreatetruecolor($width_min, $height_min);  //create frame compress image
        $destination_url = $source_url; // $img_new[0] . '_W_' . $new_width_min . '_H_' . $new_height_min . '.' . $img_new[1];
        //compress image
        imagecopyresampled($source_min, $image, 0, 0, 0, 0, $new_width_min, $new_height_min, $width_min, $height_min);
        imagejpeg($source_min, $destination_url, $quality); //copy image to folder

        $im2 = imagecrop($source_min, ['x' => 0, 'y' => 0, 'width' => $new_width_min, 'height' => $new_height_min]);
        if ($im2 !== FALSE) {
            imagepng($im2, $destination_url);
            imagedestroy($im2);
        }
        imagedestroy($source_min);
    } else {
        $destination_url = '';
    }
    return $destination_url;
}

function Compress_Image($source_url) {
    $img_new = explode('.', $source_url);
    $destination_url = $img_new[0] . '_compress.' . $img_new[1];
    $info = getimagesize($source_url);
    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source_url);
    } elseif ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($source_url);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source_url);
    }
    list($width_min, $height_min) = getimagesize($source_url);
    $array_width_height = array(
        '100' => 100,
        '80' => 80,
        '200' => 200,
    );
    foreach ($array_width_height as $new_width_min => $quality) {
        $new_width_min_name = $new_width_min;
        if ($width_min < $new_width_min) {
            $new_width_min = $width_min;
            $new_height_min = $height_min;
            $quality = 80;
        } else {
            $new_height_min = ($height_min / $width_min) * $new_width_min;
        }
        $source_min = imagecreatetruecolor($new_width_min, $new_height_min);  //create frame compress image
        $destination_url = $img_new[0] . '_compress_W' . $new_width_min_name . '.' . $img_new[1];
        //compress image
        imagecopyresampled($source_min, $image, 0, 0, 0, 0, $new_width_min, $new_height_min, $width_min, $height_min);
        imagejpeg($source_min, $destination_url, $quality); //copy image to folder
        $im2 = imagecrop($source_min, ['x' => 0, 'y' => 0, 'width' => $new_width_min, 'height' => $new_height_min]);
        if ($im2 !== FALSE) {
            imagepng($im2, $destination_url);
            imagedestroy($im2);
        }
        imagedestroy($source_min);
    }
    return $destination_url;
}

function validImage($file) {
    $size = getimagesize($file);
    return (strtolower(substr($size['mime'], 0, 5)) == 'image' ? true : false);
}

function PathuploadImage($image, $file = 'users') {
    $name = generateRandomToken() . ".png";
    if ($image != '' && $name != '') {
//        $path = 'uploads/' . $name;
        $path = 'storage/images/' . $file . '/' . $name;
        if (file_put_contents($path, base64_decode($image))) {
            $new_path = Compress_ImageSquare($path);
//            $new_path = '/' . $new_path;
            $new_path = $name;
            return $new_path;
        } else {
            return FALSE;
        }
    }
    return FALSE;
}

function generateRandomValue() {
    $length = 1;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $randomNumber = rand(100000, 9999999);
//    return md5(time() . $randomString . $randomNumber);
    return $randomNumber . $randomString;
}

function generateRandomToken() {
    $length = 3;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $randomNumber = rand(100000, 9999999);
    return md5(time() . $randomString . $randomNumber);
}

function SesstionFlash() {
    $array_data['correct_form'] = session()->get('correct_form');
    $array_data['wrong_form'] = session()->get('wrong_form');
    $array_data['correct'] = session()->get('correct');
    $array_data['wrong'] = session()->get('wrong');
    session()->forget('correct_form');
    session()->forget('wrong_form');
    session()->forget('correct');
    session()->forget('wrong');
    return $array_data;
}
// function to sum
function sum($f, $s) {
    $sum = doubleval($f) + doubleval($s);
    return round($sum, 2);
}

// function to sub
function sub($f, $s) {
    $sub = doubleval($f) - doubleval($s);
    return round($sub, 2);
}

// function to division
function division($f, $s) {
    $division = doubleval($f) / doubleval($s);
    return round($division, 2);
}

// function to multiple
function multiple($f, $s) {
    $multiple = doubleval($f) * doubleval($s);
    return round($multiple, 2);
}

// function to modulus
function modulus($f, $s) {
    $modulus = doubleval($f) % doubleval($s);
    return round($modulus, 2);
}

function url_get_contents($Url) {
    if (!function_exists('curl_init')) {
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function allNationals() {
    $nationals = array(
        'Afghan' => 'Afghan',
        'Albanian' => 'Albanian',
        'Algerian' => 'Algerian',
        'American' => 'American',
        'Andorran' => 'Andorran',
        'Angolan' => 'Angolan',
        'Antiguans' => 'Antiguans',
        'Argentinean' => 'Argentinean',
        'Armenian' => 'Armenian',
        'Australian' => 'Australian',
        'Austrian' => 'Austrian',
        'Azerbaijani' => 'Azerbaijani',
        'Bahamian' => 'Bahamian',
        'Bahraini' => 'Bahraini',
        'Bangladeshi' => 'Bangladeshi',
        'Barbadian' => 'Barbadian',
        'Barbudans' => 'Barbudans',
        'Batswana' => 'Batswana',
        'Belarusian' => 'Belarusian',
        'Belgian' => 'Belgian',
        'Belizean' => 'Belizean',
        'Beninese' => 'Beninese',
        'Bhutanese' => 'Bhutanese',
        'Bolivian' => 'Bolivian',
        'Bosnian' => 'Bosnian',
        'Brazilian' => 'Brazilian',
        'British' => 'British',
        'Bruneian' => 'Bruneian',
        'Bulgarian' => 'Bulgarian',
        'Burkinabe' => 'Burkinabe',
        'Burmese' => 'Burmese',
        'Burundian' => 'Burundian',
        'Cambodian' => 'Cambodian',
        'Cameroonian' => 'Cameroonian',
        'Canadian' => 'Canadian',
        'Cape_Verdean' => 'Cape Verdean',
        'Central_African' => 'Central African',
        'Chadian' => 'Chadian',
        'Chilean' => 'Chilean',
        'Chinese' => 'Chinese',
        'Colombian' => 'Colombian',
        'Comoran' => 'Comoran',
        'Congolese' => 'Congolese',
        'Costa_Rican' => 'Costa Rican',
        'Croatian' => 'Croatian',
        'Cuban' => 'Cuban',
        'Cypriot' => 'Cypriot',
        'Czech' => 'Czech',
        'Danish' => 'Danish',
        'Djibouti' => 'Djibouti',
        'Dominican' => 'Dominican',
        'Dutch' => 'Dutch',
        'East_Timorese' => 'East Timorese',
        'Ecuadorean' => 'Ecuadorean',
        'Egyptian' => 'Egyptian',
        'Emirian' => 'Emirian',
        'Equatorial_Guinean' => 'Equatorial Guinean',
        'Eritrean' => 'Eritrean',
        'Estonian' => 'Estonian',
        'Ethiopian' => 'Ethiopian',
        'Fijian' => 'Fijian',
        'Filipino' => 'Filipino',
        'Finnish' => 'Finnish',
        'French' => 'French',
        'Gabonese' => 'Gabonese',
        'Gambian' => 'Gambian',
        'Georgian' => 'Georgian',
        'German' => 'German',
        'Ghanaian' => 'Ghanaian',
        'Greek' => 'Greek',
        'Grenadian' => 'Grenadian',
        'Guatemalan' => 'Guatemalan',
        'Guinea_Bissauan' => 'Guinea-Bissauan',
        'Guinean' => 'Guinean',
        'Guyanese' => 'Guyanese',
        'Haitian' => 'Haitian',
        'Herzegovinian' => 'Herzegovinian',
        'Honduran' => 'Honduran',
        'Hungarian' => 'Hungarian',
        'I_Kiribati' => 'I-Kiribati',
        'Icelander' => 'Icelander',
        'Indian' => 'Indian',
        'Indonesian' => 'Indonesian',
        'Iranian' => 'Iranian',
        'Iraqi' => 'Iraqi',
        'Irish' => 'Irish',
        'Israeli' => 'Israeli',
        'Italian' => 'Italian',
        'Ivorian' => 'Ivorian',
        'Jamaican' => 'Jamaican',
        'Japanese' => 'Japanese',
        'Jordanian' => 'Jordanian',
        'Kazakhstani' => 'Kazakhstani',
        'Kenyan' => 'Kenyan',
        'Kittian_Nevisian' => 'Kittian and Nevisian',
        'Kuwaiti' => 'Kuwaiti',
        'Kyrgyz' => 'Kyrgyz',
        'Laotian' => 'Laotian',
        'Latvian' => 'Latvian',
        'Lebanese' => 'Lebanese',
        'Liberian' => 'Liberian',
        'Libyan' => 'Libyan',
        'Liechtensteiner' => 'Liechtensteiner',
        'Lithuanian' => 'Lithuanian',
        'Luxembourger' => 'Luxembourger',
        'Macedonian' => 'Macedonian',
        'Malagasy' => 'Malagasy',
        'Malawian' => 'Malawian',
        'Malaysian' => 'Malaysian',
        'Maldivan' => 'Maldivan',
        'Malian' => 'Malian',
        'Maltese' => 'Maltese',
        'Marshallese' => 'Marshallese',
        'Mauritanian' => 'Mauritanian',
        'Mauritian' => 'Mauritian',
        'Mexican' => 'Mexican',
        'Micronesian' => 'Micronesian',
        'Moldovan' => 'Moldovan',
        'Monacan' => 'Monacan',
        'Mongolian' => 'Mongolian',
        'Moroccan' => 'Moroccan',
        'Mosotho' => 'Mosotho',
        'Motswana' => 'Motswana',
        'Mozambican' => 'Mozambican',
        'Namibian' => 'Namibian',
        'Nauruan' => 'Nauruan',
        'Nepalese' => 'Nepalese',
        'New_Zealander' => 'New Zealander',
        'Nicaraguan' => 'Nicaraguan',
        'Nigerian' => 'Nigerian',
        'Nigerien' => 'Nigerien',
        'North_Korean' => 'North Korean',
        'Northern_Irish' => 'Northern Irish',
        'Norwegian' => 'Norwegian',
        'Omani' => 'Omani',
        'Pakistani' => 'Pakistani',
        'Palauan' => 'Palauan',
        'Panamanian' => 'Panamanian',
        'Papua_New_Guinean' => 'Papua New Guinean',
        'Paraguayan' => 'Paraguayan',
        'Peruvian' => 'Peruvian',
        'Polish' => 'Polish',
        'Portuguese' => 'Portuguese',
        'Qatari' => 'Qatari',
        'Romanian' => 'Romanian',
        'Russian' => 'Russian',
        'Rwandan' => 'Rwandan',
        'Saint_Lucian' => 'Saint Lucian',
        'Salvadoran' => 'Salvadoran',
        'Samoan' => 'Samoan',
        'San_Marinese' => 'San Marinese',
        'Sao_Tomean' => 'Sao Tomean',
        'Saudi' => 'Saudi',
        'Scottish' => 'Scottish',
        'Senegalese' => 'Senegalese',
        'Serbian' => 'Serbian',
        'Seychellois' => 'Seychellois',
        'Sierra_Leonean' => 'Sierra Leonean',
        'Singaporean' => 'Singaporean',
        'Slovakian' => 'Slovakian',
        'Slovenian' => 'Slovenian',
        'Solomon_Islander' => 'Solomon Islander',
        'Somali' => 'Somali',
        'South_African' => 'South African',
        'South_Korean' => 'South Korean',
        'Spanish' => 'Spanish',
        'Sri_Lankan' => 'Sri Lankan',
        'Sudanese' => 'Sudanese',
        'Surinamer' => 'Surinamer',
        'Swazi' => 'Swazi',
        'Swedish' => 'Swedish',
        'Swiss' => 'Swiss',
        'Syrian' => 'Syrian',
        'Taiwanese' => 'Taiwanese',
        'Tajik' => 'Tajik',
        'Tanzanian' => 'Tanzanian',
        'Thai' => 'Thai',
        'Togolese' => 'Togolese',
        'Tongan' => 'Tongan',
        'Trinidadian_Tobagonian' => 'Trinidadian/Tobagonian',
        'Tunisian' => 'Tunisian',
        'Turkish' => 'Turkish',
        'Tuvaluan' => 'Tuvaluan',
        'Ugandan' => 'Ugandan',
        'Ukrainian' => 'Ukrainian',
        'Uruguayan' => 'Uruguayan',
        'Uzbekistani' => 'Uzbekistani',
        'Venezuelan' => 'Venezuelan',
        'Vietnamese' => 'Vietnamese',
        'Welsh' => 'Welsh',
        'Yemenite' => 'Yemenite',
        'Zambian' => 'Zambian',
        'Zimbabwean' => 'Zimbabwean'
    );
    return $nationals;
}

function nationalityData($type = null) {
    $type_array = array(
        'Afghan' => 'Afghan',
        'Albanian' => 'Albanian',
        'Algerian' => 'Algerian',
        'American' => 'American',
        'Andorran' => 'Andorran',
        'Angolan' => 'Angolan',
        'Antiguans' => 'Antiguans',
        'Argentinean' => 'Argentinean',
        'Armenian' => 'Armenian',
        'Australian' => 'Australian',
        'Austrian' => 'Austrian',
        'Azerbaijani' => 'Azerbaijani',
        'Bahamian' => 'Bahamian',
        'Bahraini' => 'Bahraini',
        'Bangladeshi' => 'Bangladeshi',
        'Barbadian' => 'Barbadian',
        'Barbudans' => 'Barbudans',
        'Batswana' => 'Batswana',
        'Belarusian' => 'Belarusian',
        'Belgian' => 'Belgian',
        'Belizean' => 'Belizean',
        'Beninese' => 'Beninese',
        'Bhutanese' => 'Bhutanese',
        'Bolivian' => 'Bolivian',
        'Bosnian' => 'Bosnian',
        'Brazilian' => 'Brazilian',
        'British' => 'British',
        'Bruneian' => 'Bruneian',
        'Bulgarian' => 'Bulgarian',
        'Burkinabe' => 'Burkinabe',
        'Burmese' => 'Burmese',
        'Burundian' => 'Burundian',
        'Cambodian' => 'Cambodian',
        'Cameroonian' => 'Cameroonian',
        'Canadian' => 'Canadian',
        'Cape_Verdean' => 'Cape Verdean',
        'Central_African' => 'Central African',
        'Chadian' => 'Chadian',
        'Chilean' => 'Chilean',
        'Chinese' => 'Chinese',
        'Colombian' => 'Colombian',
        'Comoran' => 'Comoran',
        'Congolese' => 'Congolese',
        'Costa_Rican' => 'Costa Rican',
        'Croatian' => 'Croatian',
        'Cuban' => 'Cuban',
        'Cypriot' => 'Cypriot',
        'Czech' => 'Czech',
        'Danish' => 'Danish',
        'Djibouti' => 'Djibouti',
        'Dominican' => 'Dominican',
        'Dutch' => 'Dutch',
        'East_Timorese' => 'East Timorese',
        'Ecuadorean' => 'Ecuadorean',
        'Egyptian' => 'Egyptian',
        'Emirian' => 'Emirian',
        'Equatorial_Guinean' => 'Equatorial Guinean',
        'Eritrean' => 'Eritrean',
        'Estonian' => 'Estonian',
        'Ethiopian' => 'Ethiopian',
        'Fijian' => 'Fijian',
        'Filipino' => 'Filipino',
        'Finnish' => 'Finnish',
        'French' => 'French',
        'Gabonese' => 'Gabonese',
        'Gambian' => 'Gambian',
        'Georgian' => 'Georgian',
        'German' => 'German',
        'Ghanaian' => 'Ghanaian',
        'Greek' => 'Greek',
        'Grenadian' => 'Grenadian',
        'Guatemalan' => 'Guatemalan',
        'Guinea_Bissauan' => 'Guinea-Bissauan',
        'Guinean' => 'Guinean',
        'Guyanese' => 'Guyanese',
        'Haitian' => 'Haitian',
        'Herzegovinian' => 'Herzegovinian',
        'Honduran' => 'Honduran',
        'Hungarian' => 'Hungarian',
        'I_Kiribati' => 'I-Kiribati',
        'Icelander' => 'Icelander',
        'Indian' => 'Indian',
        'Indonesian' => 'Indonesian',
        'Iranian' => 'Iranian',
        'Iraqi' => 'Iraqi',
        'Irish' => 'Irish',
        'Israeli' => 'Israeli',
        'Italian' => 'Italian',
        'Ivorian' => 'Ivorian',
        'Jamaican' => 'Jamaican',
        'Japanese' => 'Japanese',
        'Jordanian' => 'Jordanian',
        'Kazakhstani' => 'Kazakhstani',
        'Kenyan' => 'Kenyan',
        'Kittian_Nevisian' => 'Kittian and Nevisian',
        'Kuwaiti' => 'Kuwaiti',
        'Kyrgyz' => 'Kyrgyz',
        'Laotian' => 'Laotian',
        'Latvian' => 'Latvian',
        'Lebanese' => 'Lebanese',
        'Liberian' => 'Liberian',
        'Libyan' => 'Libyan',
        'Liechtensteiner' => 'Liechtensteiner',
        'Lithuanian' => 'Lithuanian',
        'Luxembourger' => 'Luxembourger',
        'Macedonian' => 'Macedonian',
        'Malagasy' => 'Malagasy',
        'Malawian' => 'Malawian',
        'Malaysian' => 'Malaysian',
        'Maldivan' => 'Maldivan',
        'Malian' => 'Malian',
        'Maltese' => 'Maltese',
        'Marshallese' => 'Marshallese',
        'Mauritanian' => 'Mauritanian',
        'Mauritian' => 'Mauritian',
        'Mexican' => 'Mexican',
        'Micronesian' => 'Micronesian',
        'Moldovan' => 'Moldovan',
        'Monacan' => 'Monacan',
        'Mongolian' => 'Mongolian',
        'Moroccan' => 'Moroccan',
        'Mosotho' => 'Mosotho',
        'Motswana' => 'Motswana',
        'Mozambican' => 'Mozambican',
        'Namibian' => 'Namibian',
        'Nauruan' => 'Nauruan',
        'Nepalese' => 'Nepalese',
        'New_Zealander' => 'New Zealander',
        'Nicaraguan' => 'Nicaraguan',
        'Nigerian' => 'Nigerian',
        'Nigerien' => 'Nigerien',
        'North_Korean' => 'North Korean',
        'Northern_Irish' => 'Northern Irish',
        'Norwegian' => 'Norwegian',
        'Omani' => 'Omani',
        'Pakistani' => 'Pakistani',
        'Palauan' => 'Palauan',
        'Panamanian' => 'Panamanian',
        'Papua_New_Guinean' => 'Papua New Guinean',
        'Paraguayan' => 'Paraguayan',
        'Peruvian' => 'Peruvian',
        'Polish' => 'Polish',
        'Portuguese' => 'Portuguese',
        'Qatari' => 'Qatari',
        'Romanian' => 'Romanian',
        'Russian' => 'Russian',
        'Rwandan' => 'Rwandan',
        'Saint_Lucian' => 'Saint Lucian',
        'Salvadoran' => 'Salvadoran',
        'Samoan' => 'Samoan',
        'San_Marinese' => 'San Marinese',
        'Sao_Tomean' => 'Sao Tomean',
        'Saudi' => 'Saudi',
        'Scottish' => 'Scottish',
        'Senegalese' => 'Senegalese',
        'Serbian' => 'Serbian',
        'Seychellois' => 'Seychellois',
        'Sierra_Leonean' => 'Sierra Leonean',
        'Singaporean' => 'Singaporean',
        'Slovakian' => 'Slovakian',
        'Slovenian' => 'Slovenian',
        'Solomon_Islander' => 'Solomon Islander',
        'Somali' => 'Somali',
        'South_African' => 'South African',
        'South_Korean' => 'South Korean',
        'Spanish' => 'Spanish',
        'Sri_Lankan' => 'Sri Lankan',
        'Sudanese' => 'Sudanese',
        'Surinamer' => 'Surinamer',
        'Swazi' => 'Swazi',
        'Swedish' => 'Swedish',
        'Swiss' => 'Swiss',
        'Syrian' => 'Syrian',
        'Taiwanese' => 'Taiwanese',
        'Tajik' => 'Tajik',
        'Tanzanian' => 'Tanzanian',
        'Thai' => 'Thai',
        'Togolese' => 'Togolese',
        'Tongan' => 'Tongan',
        'Trinidadian_Tobagonian' => 'Trinidadian/Tobagonian',
        'Tunisian' => 'Tunisian',
        'Turkish' => 'Turkish',
        'Tuvaluan' => 'Tuvaluan',
        'Ugandan' => 'Ugandan',
        'Ukrainian' => 'Ukrainian',
        'Uruguayan' => 'Uruguayan',
        'Uzbekistani' => 'Uzbekistani',
        'Venezuelan' => 'Venezuelan',
        'Vietnamese' => 'Vietnamese',
        'Welsh' => 'Welsh',
        'Yemenite' => 'Yemenite',
        'Zambian' => 'Zambian',
        'Zimbabwean' => 'Zimbabwean'
    );
    if (isset($type_array[$type])) {
        return $type_array[$type];
    } else {
        return "";
    }
}

function allCountry() {
    $countries = array(
        'QA' => 'qatar',
        'KW' => 'kuwait',
        'SA' => 'saudi_arabia',
        'EG' => 'egypt',
        'JO' => 'jordan',
        'AE' => 'arab_emirates',
        'YE' => 'yemen',
        'IQ' => 'iraq',
        'OM' => 'oman',
        'PS' => 'palestine',
        'LB' => 'lebanon',
        'LY' => 'libya',
        'SY' => 'syria',
        'MA' => 'morocco',
        'AW' => 'europe',
        'HU' => 'mager',
        'IO' => 'british_indian_ocean',
        'TF' => 'french_southern',
        'MX' => 'mexico',
        'GB' => 'united_kingdom',
        'NO' => 'norway',
        'AT' => 'austria',
        'NE' => 'niger',
        'IN' => 'india',
        'US' => 'usa',
        'los' => 'los_angeles',
        'JP' => 'japan',
        'ET' => 'ethiopia',
        'PK' => 'pakistan',
        'ID' => 'indonesia',
        'RU' => 'russia',
        'FR' => 'france',
        'MR' => 'mauritania',
        'GI' => 'gibraltar',
        'IR' => 'iran',
        'IT' => 'italia',
        'SD' => 'sudan',
        'SE' => 'sweden',
        'EH' => 'western_desert',
        'SO' => 'somalia',
        'CN' => 'china',
        'DZ' => 'algeria',
        'BH' => 'bahrain',
        'AZ' => 'azerbaijan',
        'AM' => 'armenia',
        'ES' => 'spain',
        'AU' => 'australia',
        'AF' => 'afghanistan',
        'AL' => 'albania',
        'DE' => 'germany',
        'AG' => 'antigua_barbuda',
        'AO' => 'angola',
        'BS' => 'bahamas',
        'BR' => 'brazil',
        'PT' => 'portugal'
    );

    return $countries;
}

function countryData($type = null) {
    $type_array = array(
        'QA' => 'qatar',
        'KW' => 'kuwait',
        'SA' => 'saudi_arabia',
        'EG' => 'egypt',
        'JO' => 'jordan',
        'AE' => 'arab_emirates',
        'YE' => 'yemen',
        'IQ' => 'iraq',
        'OM' => 'oman',
        'PS' => 'palestine',
        'LB' => 'lebanon',
        'LY' => 'libya',
        'SY' => 'syria',
        'MA' => 'morocco',
        'AW' => 'europe',
        'HU' => 'mager',
        'IO' => 'british_indian_ocean',
        'TF' => 'french_southern',
        'MX' => 'mexico',
        'GB' => 'united_kingdom',
        'NO' => 'norway',
        'AT' => 'austria',
        'NE' => 'niger',
        'IN' => 'india',
        'US' => 'usa',
        'los' => 'los_angeles',
        'JP' => 'japan',
        'ET' => 'ethiopia',
        'PK' => 'pakistan',
        'ID' => 'indonesia',
        'RU' => 'russia',
        'FR' => 'france',
        'MR' => 'mauritania',
        'GI' => 'gibraltar',
        'IR' => 'iran',
        'IT' => 'italia',
        'SD' => 'sudan',
        'SE' => 'sweden',
        'EH' => 'western_desert',
        'SO' => 'somalia',
        'CN' => 'china',
        'DZ' => 'algeria',
        'BH' => 'bahrain',
        'AZ' => 'azerbaijan',
        'AM' => 'armenia',
        'ES' => 'spain',
        'AU' => 'australia',
        'AF' => 'afghanistan',
        'AL' => 'albania',
        'DE' => 'germany',
        'AG' => 'antigua_barbuda',
        'AO' => 'angola',
        'BS' => 'bahamas',
        'BR' => 'brazil',
        'PT' => 'portugal'
    );
    if (isset($type_array[$type])) {
        return $type_array[$type];
    } else {
        return "";
    }
}

function Country_select($country = null) {
    $country_array = array(
        'QA' => 'qatar',
        'KW' => 'kuwait',
        'SA' => 'saudi_arabia',
        'EG' => 'egypt',
        'JO' => 'jordan',
        'AE' => 'arab_emirates',
        'YE' => 'yemen',
        'IQ' => 'iraq',
        'OM' => 'oman',
        'PS' => 'palestine',
        'LB' => 'lebanon',
        'LY' => 'libya',
        'SY' => 'syria',
        'MA' => 'morocco',
        'AW' => 'europe',
        'HU' => 'mager',
        'IO' => 'british_indian_ocean',
        'TF' => 'french_southern',
        'MX' => 'mexico',
        'GB' => 'united_kingdom',
        'NO' => 'norway',
        'AT' => 'austria',
        'NE' => 'niger',
        'IN' => 'india',
        'US' => 'usa',
        'los' => 'los_angeles',
        'JP' => 'japan',
        'ET' => 'ethiopia',
        'PK' => 'pakistan',
        'ID' => 'indonesia',
        'RU' => 'russia',
        'FR' => 'france',
        'MR' => 'mauritania',
        'GI' => 'gibraltar',
        'IR' => 'iran',
        'IT' => 'italia',
        'SD' => 'sudan',
        'SE' => 'sweden',
        'EH' => 'western_desert',
        'SO' => 'somalia',
        'CN' => 'china',
        'DZ' => 'algeria',
        'BH' => 'bahrain',
        'AZ' => 'azerbaijan',
        'AM' => 'armenia',
        'ES' => 'spain',
        'AU' => 'australia',
        'AF' => 'afghanistan',
        'AL' => 'albania',
        'DE' => 'germany',
        'AG' => 'antigua_barbuda',
        'AO' => 'angola',
        'BS' => 'bahamas',
        'BR' => 'brazil',
        'PT' => 'portugal',
            /* 'AI' => 'أنجويلا',
              'AD' => 'أندورا',
              'UY' => 'أورجواي',
              'UZ' => 'أوزبكستان',
              'UG' => 'أوغندا',
              'UA' => 'أوكرانيا',
              'IE' => 'أيرلندا',
              'IS' => 'أيسلندا',
              'ER' => 'اريتريا',
              'EE' => 'استونيا',
              'AR' => 'الأرجنتين',
              'EC' => 'الاكوادور',
              'DK' => 'الدانمرك',
              'CV' => 'الرأس الأخضر',
              'SV' => 'السلفادور',
              'SN' => 'السنغال',
              'VA' => 'الفاتيكان',
              'PH' => 'الفيلبين',
              'AQ' => 'القطب الجنوبي',
              'CM' => 'الكاميرون',
              'CG' => 'الكونغو - برازافيل',
              'GR' => 'اليونان',
              'PG' => 'بابوا غينيا الجديدة',
              'PY' => 'باراجواي',
              'PW' => 'بالاو',
              'BW' => 'بتسوانا',
              'PN' => 'بتكايرن',
              'BB' => 'بربادوس',
              'BM' => 'برمودا',
              'BN' => 'بروناي',
              'BE' => 'بلجيكا',
              'BG' => 'بلغاريا',
              'BZ' => 'بليز',
              'BD' => 'بنجلاديش',
              'PA' => 'بنما',
              'BJ' => 'بنين',
              'BT' => 'بوتان',
              'PR' => 'بورتوريكو',
              'BF' => 'بوركينا فاسو',
              'BI' => 'بوروندي',
              'PL' => 'بولندا',
              'BO' => 'بوليفيا',
              'PF' => 'بولينيزيا الفرنسية',
              'PE' => 'بيرو',
              'TZ' => 'تانزانيا',
              'TH' => 'تايلند',
              'TW' => 'تايوان',
              'TM' => 'تركمانستان',
              'TR' => 'تركيا',
              'TT' => 'ترينيداد وتوباغو',
              'TD' => 'تشاد',
              'TG' => 'توجو',
              'TV' => 'توفالو',
              'TK' => 'توكيلو',
              'TO' => 'تونجا',
              'TN' => 'تونس',
              'TL' => 'تيمور الشرقية',
              'JM' => 'جامايكا',
              'GD' => 'جرينادا',
              'GL' => 'جرينلاند',
              'AX' => 'جزر أولان',
              'AN' => 'جزر الأنتيل الهولندية',
              'TC' => 'جزر الترك وجايكوس',
              'KM' => 'جزر القمر',
              'KY' => 'جزر الكايمن',
              'MH' => 'جزر المارشال',
              'MV' => 'جزر الملديف',
              'UM' => 'جزر الولايات المتحدة البعيدة الصغيرة',
              'SB' => 'جزر سليمان',
              'FO' => 'جزر فارو',
              'VI' => 'جزر فرجين الأمريكية',
              'VG' => 'جزر فرجين البريطانية',
              'FK' => 'جزر فوكلاند',
              'CK' => 'جزر كوك',
              'CC' => 'جزر كوكوس',
              'MP' => 'جزر ماريانا الشمالية',
              'WF' => 'جزر والس وفوتونا',
              'CX' => 'جزيرة الكريسماس',
              'BV' => 'جزيرة بوفيه',
              'IM' => 'جزيرة مان',
              'NF' => 'جزيرة نورفوك',
              'HM' => 'جزيرة هيرد وماكدونالد',
              'CF' => 'جمهورية افريقيا الوسطى',
              'CZ' => 'جمهورية التشيك',
              'DO' => 'جمهورية الدومينيك',
              'CD' => 'جمهورية الكونغو الديمقراطية',
              'ZA' => 'جمهورية جنوب افريقيا',
              'GT' => 'جواتيمالا',
              'GP' => 'جوادلوب',
              'GU' => 'جوام',
              'GE' => 'جورجيا',
              'GS' => 'جورجيا الجنوبية وجزر ساندويتش الجنوبية',
              'DJ' => 'جيبوتي',
              'JE' => 'جيرسي',
              'DM' => 'دومينيكا',
              'RW' => 'رواندا',
              'BY' => 'روسيا البيضاء',
              'RO' => 'رومانيا',
              'RE' => 'روينيون',
              'ZM' => 'زامبيا',
              'ZW' => 'زيمبابوي',
              'CI' => 'ساحل العاج',
              'WS' => 'ساموا',
              'AS' => 'ساموا الأمريكية',
              'SM' => 'سان مارينو',
              'PM' => 'سانت بيير وميكولون',
              'VC' => 'سانت فنسنت وغرنادين',
              'KN' => 'سانت كيتس ونيفيس',
              'LC' => 'سانت لوسيا',
              'MF' => 'سانت مارتين',
              'SH' => 'سانت هيلنا',
              'ST' => 'ساو تومي وبرينسيبي',
              'LK' => 'سريلانكا',
              'SJ' => 'سفالبارد وجان مايان',
              'SK' => 'سلوفاكيا',
              'SI' => 'سلوفينيا',
              'SG' => 'سنغافورة',
              'SZ' => 'سوازيلاند',
              'SR' => 'سورينام',
              'CH' => 'سويسرا',
              'SL' => 'سيراليون',
              'SC' => 'سيشل',
              'CL' => 'شيلي',
              'RS' => 'صربيا',
              'CS' => 'صربيا والجبل الأسود',
              'TJ' => 'طاجكستان',
              'GM' => 'غامبيا',
              'GH' => 'غانا',
              'GF' => 'غويانا',
              'GY' => 'غيانا',
              'GN' => 'غينيا',
              'GQ' => 'غينيا الاستوائية',
              'GW' => 'غينيا بيساو',
              'VU' => 'فانواتو',
              'VE' => 'فنزويلا',
              'FI' => 'فنلندا',
              'VN' => 'فيتنام',
              'FJ' => 'فيجي',
              'CY' => 'قبرص',
              'KG' => 'قرغيزستان',
              'KZ' => 'كازاخستان',
              'NC' => 'كاليدونيا الجديدة',
              'HR' => 'كرواتيا',
              'KH' => 'كمبوديا',
              'CA' => 'كندا',
              'CU' => 'كوبا',
              'KR' => 'كوريا الجنوبية',
              'KP' => 'كوريا الشمالية',
              'CR' => 'كوستاريكا',
              'CO' => 'كولومبيا',
              'KI' => 'كيريباتي',
              'KE' => 'كينيا',
              'LV' => 'لاتفيا',
              'LA' => 'لاوس',
              'LU' => 'لوكسمبورج',
              'LR' => 'ليبيريا',
              'LT' => 'ليتوانيا',
              'LI' => 'ليختنشتاين',
              'LS' => 'ليسوتو',
              'MQ' => 'مارتينيك',
              'MO' => 'ماكاو الصينية',
              'MT' => 'مالطا',
              'ML' => 'مالي',
              'MY' => 'ماليزيا',
              'YT' => 'Mayت',
              'MG' => 'مدغشقر',
              'MK' => 'مقدونيا',
              'MW' => 'ملاوي',
              'ZZ' => 'منطقة غير معرفة',
              'MN' => 'منغوليا',
              'MU' => 'موريشيوس',
              'MZ' => 'موزمبيق',
              'MD' => 'مولدافيا',
              'MC' => 'موناكو',
              'MS' => 'مونتسرات',
              'MM' => 'ميانمار',
              'FM' => 'ميكرونيزيا',
              'NA' => 'ناميبيا',
              'NR' => 'نورو',
              'NP' => 'نيبال',
              'NG' => 'نيجيريا',
              'NI' => 'نيكاراجوا',
              'NZ' => 'نيوزيلاندا',
              'NU' => 'نيوي',
              'HT' => 'هايتي',
              'HN' => 'هندوراس',
              'NL' => 'هولندا',
              'HK' => 'هونج كونج الصينية',
              'BA' => 'البوسنة والهرسك',
              'GA' => 'الجابون',
              'ME' => 'الجبل الأسود', */
    );
    $output = '<select name="address" id="country" class="select select2 user_country" style="width:100%">';
    foreach ($country_array as $key => $country_name) {
        $output .= '<option value="' . $key . '"';
        if ($country == $key) {
            $output .= ' selected';
        }
        $output .= '>' . $country_name . '</option>';
    }
    $output .= '</select>';
    return $output;
}

function countryName($type = null) {
    $type_array = array(
        'africa' => 'أفريقيا',
        'asia' => 'آسيا',
        'europe' => 'أوربا',
        'north_amarica' => 'أمريكا الشمالية',
        'south_america' => 'أمريكا الجنوبية',
        'australia' => 'استراليا'
    );

    if (isset($type_array[$type])) {
        return $type_array[$type];
    } else {
        return "";
    }
}

function countryType() {

    $type_array = array(
        'africa' => 'أفريقيا',
        'asia' => 'آسيا',
        'europe' => 'أوربا',
        'north_amarica' => 'أمريكا الشمالية',
        'south_america' => 'أمريكا الجنوبية',
        'australia' => 'استراليا'
    );
    return $type_array;
}

function genderType() {

    $gender_array = array(
        'male' => 'Male ',
        'female' => 'Female '
    );
    return $gender_array;
}

function fun_session_num() {

    $gender_array = array(
        'null' => 'null',
        '0' => '0',
        '10' => '10',
        '20' => '20',
        '50' => '50',
        '100' => '100',
    );
    return $gender_array;
}

function fieldType() {
    $field_array = array(
        'text' => 'نصى', 'textarea' => 'وصف',
        'tinymce' => 'محرر', 'email' => 'بريد إلكترونى',
        'datepicker' => 'تاريخ', 'timepicker' => 'وقت',
        'number' => 'رقم', 'phone' => 'هاتف',
        'file' => 'ملف', 'image' => 'صورة',
        'video' => 'فيديو', 'color' => 'لون',
        'range' => 'بداية ونهاية', 'location' => 'مكان',
        'group' => 'مجموعة', 'radio' => 'اختيار موحد',
        'select' => 'قائمة اختيار', 'checkbox' => 'اختيارات متعددة',
        'url' => 'رابط'
    );
    return $field_array;
}

function tableView() {

    $limit_array = array(
        10 => '10',
        25 => '25',
        50 => '50',
        100 => '100',
        250 => '250'
    );
    return $limit_array;
}

function statusData($status = null) {

    $output = '';
    $status_array = array(
        0 => 'not active',
        1 => 'active'
    );
    foreach ($status_array as $key => $status_name) {
        if ($status == $key) {
            if ($key == 1) {
                $class = "btn-success";
            } else if ($key == 0) {
                $class = "btn-danger";
            }
            $output = "<span class= 'label $class' >$status_name</span>";
        }
    }
    return $output;
}

function socialstatusData($status = null) {

    $output = '';
    $status_array = array(
        'none' => 'None',
        'single' => 'Single',
        'engaged' => 'Engaged',
        'married' => 'Married',
        'relationship' => 'In a relationship'
    );
    foreach ($status_array as $key => $status_name) {
        if ($status == $key) {
            if ($key == 'married') {
                $class = "btn-success";
            } else if ($key == 'engaged') {
                $class = "btn-primary";
            } else if ($key == 'single') {
                $class = "btn-info";
            } else if ($key == 'relationship') {
                $class = "btn-warning";
            } else if ($key == 'none') {
                $class = "btn-default";
            }
            $output = "<span class= 'label $class' >$status_name</span>";
        }
    }
    return $output;
}

function statusType() {

    $status_array = array(
        0 => 'not active',
        1 => 'active'
    );
    return $status_array;
}

function socialstatusType() {
    $status_array = array(
        'none' => 'None',
        'single' => 'Single',
        'engaged' => 'Engaged',
        'married' => 'Married',
        'relationship' => 'In a relationship'
    );
    return $status_array;
}

function statusGender() {
    $status_array = array(
        'male' => 'Male ',
        'female' => 'Female '
    );
    return $status_array;
}

function readStatus($status = null) {

    $output = '';
    $status_array = [0 => 'Not Read', 1 => 'Read'];
    foreach ($status_array as $key => $status_name) {
        if ($status == $key) {
            if ($key == 1) {
                $class = "btn-success";
            } else {
                $class = "btn-danger";
            }
            $output = "<span class= 'label $class' >$status_name</span>";
        }
    }
    return $output;
}

function activeStatus($status = null) {

    $output = '';
    $status_array = [0 => 'Not Active', 1 => 'Active'];
    foreach ($status_array as $key => $status_name) {
        if ($status == $key) {
            if ($key == 1) {
                $class = "btn-success";
            } else {
                $class = "btn-danger";
            }
            $output = "<span class= 'label $class' >$status_name</span>";
        }
    }
    return $output;
}

function commentType() {

    $status_array = array(
        0 => 'All',
        1 => 'Member Only'
    );
    return $status_array;
}

function showType() {

    $show_array = array(
        0 => 'NO',
        1 => 'Yes'
    );
    return $show_array;
}

function showTypes() {

    $show_array = array(
        'no' => 'NO',
        'yes' => 'Yes'
    );
    return $show_array;
}

function arabic_date($date) {
    $months = array(
        "Jan" => "January",
        "Feb" => "February",
        "Mar" => "March",
        "Apr" => "April",
        "May" => "May",
        "Jun" => "June",
        "Jul" => "July",
        "Aug" => "August",
        "Sep" => "September",
        "Oct" => "October",
        "Nov" => "November",
        "Dec" => "December"
    );
    $en_month = date("M", strtotime($date));

    $ar_month = $months[$en_month];

    $last_date = str_replace($en_month, $ar_month, $date);

    echo $last_date;
}

function stringMonth_number($num) {
    $months = array(
        "01" => "January",
        "02" => "February",
        "03" => "March",
        "04" => "April",
        "05" => "May",
        "06" => "June",
        "07" => "July",
        "08" => "August",
        "09" => "September",
        "10" => "October",
        "11" => "November",
        "12" => "December"
    );
    return $months[$num];
}

function string_date_number($date) {
    $date_slash = $date . '/';
    $months = array(
        "01" => "January",
        "02" => "February",
        "03" => "March",
        "04" => "April",
        "05" => "May",
        "06" => "June",
        "07" => "July",
        "08" => "August",
        "09" => "September",
        "10" => "October",
        "11" => "November",
        "12" => "December"
    );
    $en_month = date("m", strtotime($date));

    $ar_month = $months[$en_month];
    $en_month_slash = $en_month . '/';
    $last_date = str_replace($en_month_slash, $ar_month, $date_slash);
//    $last_date = str_replace($en_month,$ar_month, $date);
    $last_date = str_replace('/', ' ', $last_date);
    echo $last_date;
//    echo $ar_month;
}

function week_select($week = null) {

    $week_array = array(
        'Sat' => 'السبت',
        'Sun' => 'الاحد',
        'Mon' => 'الاثنين',
        'Tue' => 'الثلاثاء',
        'Wed' => 'الاربعاء',
        'Thu' => 'الخميس',
        'Fri' => 'الجمعة'
    );
    $output = '<select name="week[]" id="week" class="select select2" multiple style="width:100%">';
    foreach ($week_array as $key => $week_name) {
        $output .= '<option value="' . $key . '"';
        $weeks = isset($week) ? $week : array();
        if (!empty($weeks)) {
            foreach ($weeks as $values) {
                if ($values == $key) {
                    $output .= ' selected';
                }
            }
        }
        if ($week == $key) {
            $output .= ' selected';
        }
        $output .= '>' . $week_name . '</option>';
    }
    $output .= '</select>';
    return $output;
}

function week_name($week = null) {
    $output = '';
    $week_array = array(
        'Sat' => 'السبت',
        'Sun' => 'الاحد',
        'Mon' => 'الاثنين',
        'Tue' => 'الثلاثاء',
        'Wed' => 'الاربعاء',
        'Thu' => 'الخميس',
        'Fri' => 'الجمعة'
    );
    foreach ($week_array as $key => $week_name) {
        if ($week == $key) {
            $output = $week_name;
        }
    }
    return $output;
}

function date_day_number_select($day, $week = null) {

    $week_array = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        '13' => '13',
        '14' => '14',
        '15' => '15',
        '16' => '16',
        '17' => '17',
        '18' => '18',
        '19' => '19',
        '20' => '20',
        '21' => '21',
        '22' => '22',
        '23' => '23',
        '24' => '24',
        '25' => '25',
        '26' => '26',
        '27' => '27',
        '28' => '28',
        '29' => '29',
        '30' => '30',
        '31' => '31'
    );
    $output = '<select name="' . $day . '" id="day" class="select select2" style="width:100%">';
    foreach ($week_array as $key => $week_name) {
        $output .= '<option value="' . $key . '"';
        if ($week == $key) {
            $output .= ' selected';
        }
        $output .= '>' . $week_name . '</option>';
    }
    $output .= '</select>';
    return $output;
}

function date_day_select($day, $week = null) {

    $week_array = array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        '13' => '13',
        '14' => '14',
        '15' => '15',
        '16' => '16',
        '17' => '17',
        '18' => '18',
        '19' => '19',
        '20' => '20',
        '21' => '21',
        '22' => '22',
        '23' => '23',
        '24' => '24',
        '25' => '25',
        '26' => '26',
        '27' => '27',
        '28' => '28',
        '29' => '29',
        '30' => '30',
        '31' => '31'
    );
    $output = '<select name="' . $day . '" id="day" class="select select2" style="width:100%">';
    foreach ($week_array as $key => $week_name) {
        $output .= '<option value="' . $key . '"';
        if ($week == $key) {
            $output .= ' selected';
        }
        $output .= '>' . $week_name . '</option>';
    }
    $output .= '</select>';
    return $output;
}

function genderName($gender = null) {
    $gender_array = array(
        'male' => 'Male ',
        'female' => 'Female '
    );

    if (isset($gender_array[$gender])) {
        return $gender_array[$gender];
    } else {
        return "";
    }
}

function statusName($status = null) {
    $status_array = array(
        0 => 'not active',
        1 => 'active'
    );

    if (isset($status_array[$status])) {
        return $status_array[$status];
    } else {
        return "";
    }
}

function ShowName($show = null) {
    $show_array = array(
        0 => 'NO',
        1 => 'Yes'
    );

    if (isset($show_array[$show])) {
        return $show_array[$show];
    } else {
        return "";
    }
}

function ShowNames($show = null) {
    $show_array = array(
        'no' => 'NO',
        'yes' => 'Yes'
    );

    if (isset($show_array[$show])) {
        return $show_array[$show];
    } else {
        return "";
    }
}

