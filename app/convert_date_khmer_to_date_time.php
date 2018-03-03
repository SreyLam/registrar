<?php

function convert_khmer_to_month($month){
    switch ($month) {
        case 'មករា':
            return 1;
            break;
        case 'កុម្ភះ':
            return 2;
            break;
        case 'មិនា':
            return 3;
            break;
        case 'មេសា':
            return 4;
            break;
        case 'ឪសភា':
            return 5;
            break;
        case 'មិថុណា':
            return 6;
            break;
        case 'កក្ដដា':
            return 7;
            break;
        case 'សីហា':
            return 8;
            break;
        case 'កញ្ញា':
            return 9;
            break;
        case 'តុលា':
            return 10;
            break;
        case 'វិច្ឆិកា':
            return 11;
            break;
        case 'ធ្នូរ':
            return 12;
            break;
        default:
            return '';
    }
}


function convert_khmer_to_day($year)
{
    $khmer_number = array('០', '១', '២', '៣', '៤', '៥', '៦', '៧' , '៨', '៩');
    $tmp = array();

    dd(str_word_count($year));

    foreach (str_split($year) as $item){


        foreach ($khmer_number as $key => $value){
            if($item == $value){
                array_push($tmp, $key);
            }
        }
    }



    return implode($tmp);
}