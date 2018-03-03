<?php

function convert_khmer_month($month)
{
    switch ($month) {
        case 1:
            return 'មករា';
            break;
        case 2:
            return 'កុម្ភះ';
            break;
        case 3:
            return 'មិនា';
            break;
        case 4:
            return 'មេសា';
            break;
        case 5:
            return 'ឪសភា';
            break;
        case 6:
            return 'មិថុណា';
            break;
        case 7:
            return 'កក្ដដា';
            break;
        case 8:
            return 'សីហា';
            break;
        case 9:
            return 'កញ្ញា';
            break;
        case 10:
            return 'តុលា';
            break;
        case 11:
            return 'វិច្ឆិកា';
            break;
        case 12:
            return 'ធ្នូរ';
            break;
        default:
            return '';
    }
}


function convert_khmer_day($year)
{
    $khmer_number = array('០', '១', '២', '៣', '៤', '៥', '៦', '៧' , '៨', '៩');
    $tmp = array();

    foreach (str_split($year) as $item){
        for ($i=0; $i<10; $i++){
            if($item == $i){
                array_push($tmp, $khmer_number[$i]);
                break;
            }

        }
    }

    return implode($tmp);
}

function convert_date_khmer ($date){
    return convert_khmer_day($date);
}