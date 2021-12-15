<?php

// if(!function_exists('debugger')){
    function debugger($data, $is_die = false){
        echo "<pre style = 'color: #000;'>";
        print_r($data);
        echo "</pre>";
        if($is_die){
            exit;
        }
    }
// }

// if(!funtion_exists('redirect')){
    function redirect($path, $session_status = null, $session_status_msg = null){
        if($session_status != NULL){
            $_SESSION[$session_status] = $session_status_msg;
        }

        @header('location: '.$path);
        exit;
    }
// }

// if(!function_exists('flash')){
    function flash(){
        if(isset($_SESSION['success']) && $_SESSION['success'] != ""){
            echo "<div class='alert alert-dismissible alert-success fade show' role='alert'>".$_SESSION['success']."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['error']) && $_SESSION['error'] != ""){
            echo "<div class='alert alert-dismissible alert-danger fade show' role='alert'>".$_SESSION['error']."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['warning']) && $_SESSION['warning'] != ""){
            echo "<div class='alert alert-dismissible alert-warning fade show' role='alert'>".$_SESSION['warning']."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            unset($_SESSION['warning']);
        }
        if(isset($_SESSION['info']) && $_SESSION['info'] != ""){
            echo "<div class='alert alert-dismissible alert-info fade show' role='alert'>".$_SESSION['info']."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            unset($_SESSION['info']);
        }
    }
// }

//if(!function_exists('flash')){
    function generateRandomString($length = 30){
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $len = strlen($chars);
        $rand = "";
        for($i = 0; $i<$length; $i++){
            $rand .= $chars[rand(0, $len-1)];
        }
        return $rand;
    }
//}

function getCurrentPage(){
    $current_page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME); //php-self: returns the current loaded file. pathinfo: returns array of file location. PATHINFO_FILENAME: returns filename from pathinfo array.
    return $current_page;
}

function sanitize($str){
    $str = rtrim($str);
    $str = stripslashes($str);
    $str = addslashes($str);
    $str = strip_tags($str); //htmlentities() => html_entity_decode()
    return $str;
}

function uploadSingleFile($files, $destination){
    if($files['error'] == 0){
        $ext = pathinfo($files['name'], PATHINFO_EXTENSION);
        if(in_array(strtolower($ext), ALLOWED_EXTENSION)){
            $file_name = ucfirst($destination)."-".date('Ymdhis').rand(0,999).".".$ext;
            $folder = UPLOAD_DIR.'/'.$destination;
            if(!is_dir($folder)){
                mkdir($folder, '0007', true);
            }

            $success = move_uploaded_file($files['tmp_name'], $folder.'/'.$file_name);
            if($success){
                return $file_name;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }else {
        return null;
    }
}

?>