<?php

function filled($data)
{
    return !empty($data);
}

function unique($filePath,$key,$target)
{
    $isUnique = true;
    $data = file_get_contents($filePath);
    $data = json_decode($data, true);
    foreach ($data as $k => $v) {
        if ($v[$key] == $target) {
            $isUnique =  false;
            break;
        }
    }
    return $isUnique;
}