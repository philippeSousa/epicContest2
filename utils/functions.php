<?php

function insertPhotos($idPhoto, $userId, $urlPhoto, $urlMiniature, $conn)
{

    $sth = $conn->prepare('INSERT INTO photos (id_photo, id_user,nb_like, url_photo, url_miniature, date_submit) VALUES(:id_photo,:id_user,:nb_like, ":photo", ":miniature", :date)');
    $sth->bindParam(':id_photo', $idPhoto);
    $sth->bindParam(':id_user', $userId)
    $sth->bindParam(':nb_like', 0);
    $sth->bindParam(':photo', $urlPhoto);
    $sth->bindParam(':miniature', $urlMiniature);
    $sth->bindParam(':date', date('Ymd'));

    return $sth->execute();
}

function vote($idUser, $idPhoto, $conn)
{
    $sth = $conn->prepare('INSERT INTO vote (id_user, id_photo) VALUES(":id", ":photo")');
    $sth->bindParam(':id', $idUser);
    $sth->bindParam(':photo', $idPhoto);
    return $sth->execute();
}

function voteExiste($idUser, $idPhoto, $conn)
{
    $sth = $conn->prepare('SELECT count(1) from vote where user_id = :user_id and photo_id = :photo_id');
    return $sth->execute(array(':user_id' => $idUser, ':photo_id' => $idPhoto));

}

function selectBestPhotoMonth()
{
    
}

function selectBestPhotoWeek()
{
    
}

function selectPhotoMonth()
{
    
}

function selectPhotoWeek()
{
    
}

function getUser($userId, $conn)
{
    $sth = $conn->prepare('SELECT * FROM users where id = :id');
    $sth->bindParam(':id', $userId);
    return $sth->execute();
}

function getPhotoByUser($userId, $conn)
{
    $sth = $conn->prepare('SELECT * FROM photo where user_id = :id');
    $sth->bindParam(':id', $userId);
    return $sth->execute();
}

function verifUser($userId,$conn)
{
$bool = false;
    $sth = $conn->prepare('SELECT * FROM users where id_user_fb = :id');
    $sth->bindParam(':id', $userId);
    $sth->execute();
    $res = $sth->fetchAll();
 if (count($res) == 0){
    echo ' insert l"utilisateur';
    insertUser($userId,$conn);
 }else{
    echo " existe deja";
    $bool = true;
}
    return $bool;
}

function insertUser($userId,$conn)
{
    $date = date('Ymd');
    $sth = $conn->prepare('INSERT INTO users (id_user_fb, date_submit) VALUES(:id_user_fb, :date_submit)');
    $sth->bindParam(':id_user_fb', $userId);
    $sth->bindParam(':date_submit', $date);
    return $sth->execute();
}