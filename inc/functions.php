<?php
function validate(){
        if(empty($_POST['flight'])){
            $validation['flight']="This input required";
        } else $validation['flight']='';

        if(empty($_POST['code'])){
            $validation['code']="This input required";
        }elseif (!preg_match('/^[0-9]{11}$/',$_POST['code'])){
            $validation['code']='Bad personal code format. Required 11 digit code.';
        } else $validation['code']='';

        if(empty($_POST['name'])){
            $validation['name']="This input required";
        } elseif (!preg_match('/^[a-zA-Z]{0,100}$/',$_POST['name'])){
            $validation['name']='Bad name. ';
        } else $validation['name']='';

        if(empty($_POST['surname'])){
            $validation['surname']="This input required";
        } elseif (!preg_match('/^[a-zA-Z]{0,100}$/',$_POST['surname'])){
            $validation['surname']='Bad surname.';
        } else $validation['surname']='';

        if(empty($_POST['from'])){
            $validation['from']="This input required";
        } else $validation['from']='';

        if(empty($_POST['to'])){
            $validation['to']="This input required";
        } else $validation['to']='';

        if(empty($_POST['price'])){
            $validation['price']="This input required";
        } else $validation['price']='';

        if(empty($_POST['baggage'])){
            $validation['baggage']="This input required";
        } else $validation['baggage']='';

        if(empty($_POST['note'])){
            $validation['note']="This input required";
        } elseif (!preg_match('/^[a-zA-Z0-9\s,.:$!?-]{50,1000}$/',$_POST['note'])){
            $validation['note']='Bad note input. Number of characters must be between 50 and 1000.';
        } else $validation['note']='';

    return $validation;
}
function price(){
     if($_POST['baggage']>20) {
         return (float)$_POST['price'] + 30;
     }
     return $_POST['price'];

}

function printData(){
    $data="data/messages.txt";
    $content=file_get_contents($data);
    $formData=implode(',',$_POST);
    $content.=substr($formData, 0, -1)."\n";
    file_put_contents($data,$content);

}
function showData(){
    $keys=['flight','code','name','surname','from','to','price','baggage',
        'note'];
    $data="data/messages.txt";
    $messages=file_get_contents($data,true);
    if (!empty($messages)) {
        $messages = explode("\n", substr($messages, 0, -1));
        foreach ($messages as $key => $value) {
            $messages[$key] = array_combine($keys, explode(',', $value));
            if ( isset($_GET['searchBtn'])&& ($_GET['search']==$messages[$key]['code']||$_GET['search']==$messages[$key]['flight'])){
                return [$messages[$key]];
            }
        }
        return $messages;
    }
    return $messages;
}