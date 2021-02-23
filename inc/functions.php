<?php
function validate($data){
        if(empty($data['flight'])){
            $validation['flight']="This input required";
        } else $validation['flight']='';

        if(empty($data['code'])){
            $validation['code']="This input required";
        }elseif (!preg_match('/^[0-9]{11}$/',$data['code'])){
            $validation['code']='Bad personal code format. Required 11 digit code.';
        } else $validation['code']='';

        if(empty($data['name'])){
            $validation['name']="This input required";
        } elseif (!preg_match('/^[a-zA-Z]{0,100}$/',$data['name'])){
            $validation['name']='Bad name. ';
        } else $validation['name']='';

        if(empty($data['surname'])){
            $validation['surname']="This input required";
        } elseif (!preg_match('/^[a-zA-Z]{0,100}$/',$data['surname'])){
            $validation['surname']='Bad surname.';
        } else $validation['surname']='';

        if(empty($data['baggage'])){
            $validation['baggage']="This input required";
        } else $validation['baggage']='';

        if(empty($data['note'])){
            $validation['note']="This input required";
        } elseif (!preg_match('/^[a-zA-Z0-9\s,.:$!?-]{50,1000}$/',$data['note'])){
            $validation['note']='Bad note input. Number of characters must be between 50 and 1000.';
        } else $validation['note']='';

    return $validation;
}
function price($data){
     if($data['baggage']>20) {
         return (float)$data['price'] + 30;
     }
     elseif (isset($_POST['price'])){
        return $data['price'];
     }

}
function check($data){
    if(isset($data['from'])) {
        return $data['from'];
    }
    if(isset($data['to'])) {
        return $data['to'];
    }

}