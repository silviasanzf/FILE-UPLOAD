<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 10/10/18
 * Time: 22:11
 */

if(isset($_REQUEST['delete'])) {
    $link = 'upload/'.$_REQUEST['delete'];
    if(unlink($link)) {
        echo "Supprimer avec succès";
    } else {
        echo "échec de la suppression";
    }
}
