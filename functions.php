<?php

function imdb_csatlakozas() {
    $conn = mysqli_connect("localhost", "root", "") or die("Csatlakozási hiba");
	if ( false == mysqli_select_db($conn, "imdb" )  ) {

		return null;
	}
    mysqli_query($conn, 'SET NAMES UTF-8');
	mysqli_query($conn, 'SET character_set_results=utf8');
	mysqli_set_charset($conn, 'utf8');

	return $conn;
}

function rendezo_beszur($name, $birth) {
    if ( !($conn = imdb_csatlakozas()) ) {
        return false;
    }
    $temp = mysqli_prepare( $conn,"INSERT IGNORE INTO DIRECTOR(name, birth) VALUES (?, ?)");
    mysqli_stmt_bind_param($temp, "sd", $name, $birth);
    $sikeres = mysqli_stmt_execute($temp);
    mysqli_close($conn);
    return $sikeres;

}

function rendezolistatLeker() {

if ( !($conn = imdb_csatlakozas()) ) {
		return false;
	}

	$result = mysqli_query( $conn,"SELECT id, name, birth FROM director");

	mysqli_close($conn);
	return $result;
}

function rendezoIDlistatLeker() {

if ( !($conn = imdb_csatlakozas()) ) {
		return false;
	}

	$result = mysqli_query( $conn,"SELECT id FROM director");

	mysqli_close($conn);
	return $result;
}

function rendezo_modositas($id, $name, $birth) {
    if ( !($conn = imdb_csatlakozas()) ) {
        return false;
    }
    $temp = mysqli_prepare( $conn,"UPDATE director SET name=?, birth=? WHERE director.id = ?");
    mysqli_stmt_bind_param($temp, "sdd",$name,$birth,$id);
    $sikeres = mysqli_stmt_execute($temp);
    mysqli_close($conn);
    return $sikeres;
}

function rendezotorlese($id) {
    if ( !($conn = imdb_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"DELETE FROM DIRECTOR WHERE id=?");
    mysqli_stmt_bind_param($stmt, "d", $id);
    $sikeres = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;
}

function studio_beszur($name, $city, $pics) {
    if ( !($conn = imdb_csatlakozas()) ) {
        return false;
    }
    $temp = mysqli_prepare( $conn,"INSERT IGNORE INTO STUDIO(name, city, pics) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($temp, "sss", $name, $city, $pics);
    $sikeres = mysqli_stmt_execute($temp);
    mysqli_close($conn);
    return $sikeres;

}

function studiolistatLeker() {
    if ( !($conn = imdb_csatlakozas()) ) {
		return false;
	}
    $result = mysqli_query( $conn,"SELECT * FROM studio");

    mysqli_close($conn);
	return $result;
}

function filmek_szama($name){
    if ( !($conn = imdb_csatlakozas()) ) {
    		return false;
    }
     $result = mysqli_query( $conn,"SELECT COUNT(title) AS countname FROM movie WHERE movie.studioID='$name'");
     while ( ($current_row = mysqli_fetch_assoc($result))!= null) {
                 $row = $current_row;
     }

     mysqli_close($conn);
     return $row["countname"];
}

function studioIDlistatLeker() {
if ( !($conn = imdb_csatlakozas()) ) {
		return false;
	}
    $result = mysqli_query( $conn,"SELECT name FROM studio");
    mysqli_close($conn);
	return $result;
}

function studiotorlese($name) {
    if ( !($conn = imdb_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"DELETE FROM STUDIO WHERE name=?");
    mysqli_stmt_bind_param($stmt, "s", $name);
    $sikeres = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;
}



function studio_modositas($name, $city, $pics) {
    if ( !($conn = imdb_csatlakozas()) ) {
        return false;
    }

    $temp = mysqli_prepare( $conn,"UPDATE studio SET name=?, city=?, pics=? WHERE studio.name = ?");
    mysqli_stmt_bind_param($temp, "ssss",$name,$city,$pics,$name);
    $sikeres = mysqli_stmt_execute($temp);
    mysqli_close($conn);
    return $sikeres;
}

function studio_top3(){
    if ( !($conn = imdb_csatlakozas()) ) {
		return false;
	}
    $result = mysqli_query( $conn,"SELECT name FROM studio INNER JOIN movie ON name = studioID WHERE (name) IN (SELECT studioID FROM movie GROUP BY studioID ORDER BY COUNT(studioID) DESC) GROUP BY name ORDER BY COUNT(NAME) DESC LIMIT 3");

    mysqli_close($conn);
	return $result;}


function szinesz_beszur($name, $nationality, $birth) {
    if ( !($conn = imdb_csatlakozas()) ) {
        return false;
    }
    $temp = mysqli_prepare( $conn,"INSERT IGNORE INTO ACTOR(name, nationality, birth) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($temp, "ssd", $name, $nationality, $birth);
    $sikeres = mysqli_stmt_execute($temp);
    mysqli_close($conn);
    return $sikeres;
}

function szineszlistatLeker() {
if ( !($conn = imdb_csatlakozas()) ) {
		return false;
	}
    $result = mysqli_query( $conn,"SELECT id, name, nationality, birth FROM actor");

	mysqli_close($conn);
	return $result;
}

function szineszIDlistatLeker() {
if ( !($conn = imdb_csatlakozas()) ) {
		return false;
	}
    $result = mysqli_query( $conn,"SELECT id FROM actor");

	mysqli_close($conn);
	return $result;
}

function szinesztorlese($id) {
    if ( !($conn = imdb_csatlakozas()) ) {
    return false;
    }
    $stmt = mysqli_prepare( $conn,"DELETE FROM ACTOR WHERE id=?");
    mysqli_stmt_bind_param($stmt, "d", $id);
    $sikeres = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;
}

function szinesz_modositas($id, $name, $nationality, $birth) {
    if ( !($conn = imdb_csatlakozas()) ) {
        return false;
    }
    $temp = mysqli_prepare( $conn,"UPDATE actor SET name=?, nationality=?, birth=? WHERE actor.id = ?");
    mysqli_stmt_bind_param($temp, "ssdd",$name,$nationality,$birth,$id);
    $sikeres = mysqli_stmt_execute($temp);
    mysqli_close($conn);
    return $sikeres;
}

function film_beszur($title, $release_date, $genre, $hossz, $rank, $directorID, $studioID) {
    if ( !($conn = imdb_csatlakozas()) ) {
        return false;
    }
    $temp = mysqli_prepare( $conn,"INSERT IGNORE INTO MOVIE(title, release_date, genre, hossz, rank, directorID, studioID) VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($temp, "sssddds", $title, $release_date, $genre, $hossz, $rank, $directorID, $studioID);
    $sikeres = mysqli_stmt_execute($temp);
    mysqli_close($conn);
    return $sikeres;
}

function filmlistatLeker() {
if ( !($conn = imdb_csatlakozas()) ) {
		return false;
	}
    $result = mysqli_query( $conn,"SELECT * FROM movie");

	mysqli_close($conn);
	return $result;
}

function szineszek_szama($title){
    if ( !($conn = imdb_csatlakozas()) ) {
    		return false;
    }
     $result = mysqli_query( $conn,"SELECT COUNT(movieID) AS countname FROM role WHERE role.movieID='$title'");
     while ( ($current_row = mysqli_fetch_assoc($result))!= null) {
           $row = $current_row;
     }

     mysqli_close($conn);
     return $row["countname"];
}

function filmIDlistatLeker() {
if ( !($conn = imdb_csatlakozas()) ) {
		return false;
	}
    $result = mysqli_query( $conn,"SELECT title FROM movie");

	mysqli_close($conn);
	return $result;
}

function film_modositas($title, $release_date, $genre, $hossz, $rank) {
    if ( !($conn = imdb_csatlakozas()) ) {
        return false;
    }
    $temp = mysqli_prepare( $conn,"UPDATE movie SET release_date=?, genre=?, hossz=?, rank=? WHERE movie.title = ?");
    mysqli_stmt_bind_param($temp, "dsdds",$release_date,$genre,$hossz,$rank,$title);
    $sikeres = mysqli_stmt_execute($temp);
    mysqli_close($conn);
    return $sikeres;
}

function filmtorlese($title) {
    if ( !($conn = imdb_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"DELETE FROM MOVIE WHERE title=?");
    mysqli_stmt_bind_param($stmt, "s", $title);
    $sikeres = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;
}

function szerep_beszur($actorID, $movieID) {
    if ( !($conn = imdb_csatlakozas()) ) {
        return false;
    }
    $temp = mysqli_prepare( $conn,"INSERT IGNORE INTO ROLE(actorID, movieID) VALUES (?, ?)");
    mysqli_stmt_bind_param($temp, "ds", $actorID, $movieID);
    $sikeres = mysqli_stmt_execute($temp);
    mysqli_close($conn);
    return $sikeres;
}

function szereplistatLeker() {
if ( !($conn = imdb_csatlakozas()) ) {
		return false;
	}
    $result = mysqli_query( $conn,"SELECT actorID, movieID FROM role");

	mysqli_close($conn);
	return $result;
}

function szereptorlese($actorID, $movieID) {
    if ( !($conn = imdb_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"DELETE FROM ROLE WHERE actorID=? AND movieID=?");
    mysqli_stmt_bind_param($stmt, "ds", $actorID, $movieID);
    $sikeres = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;
}

function diagram_feltoltes(){
    if ( !($conn = imdb_csatlakozas()) ) {
        return false;
    }
    $result = mysqli_query( $conn,"SELECT name, COUNT(title) AS countname FROM studio, movie WHERE studio.name=movie.studioID GROUP BY name");
    while( $egySor = mysqli_fetch_assoc($result) ) {
           echo '{ y: '.$egySor["countname"].', name: "'.$egySor["name"].'" },';
    }

    mysqli_close($conn);
    return $result;
}
?>


