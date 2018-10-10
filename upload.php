<?php
if (!empty($_FILES['files']['name'][0])){
    $files=$_FILES['files'];
    $uploaded = array();
    $failed = array();
    $allowed= array('png', 'gif', 'jpg');

    foreach($files['name'] as $position =>$file_name){

        $file_tmp = $files ['tmp_name'][$position];
        $file_size = $files ['size'] [$position];
        $file_error = $files['error'][$position];

        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {

                if ($file_size <= 1000000) {

                    $file_name_new = uniqid('image', false) . '.' . $file_ext;
                    $file_destination = 'upload/' . $file_name_new;


                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        $uploaded[$position] = $file_destination;

                    } else {
                        $failed[$position] = "[{$file_name}] erreur sur l'upload.";
                    }
                }else{
                        $failed[$position] = "[{$file_name}] est trop volumineux.";
                    }

                } else {
                    $failed[$position] = "[$file_name] est trop volumineux.";
                }

            } else {
                $failed[$position] = "[{$file_name}] l'extension de fichier'{$file_ext} ' n'est pas autorisée.";

            }

        }

if(!empty($uploader)){
    print_r($uploaded);
}


        if (!empty($failed)) {
            print_r($failed);

}
}