<?php

include "actions.php";

include "views/header.php";

if (isset($_GET['page'])) {
	
	if ($_GET['page'] == "yourposts") {

		include 'views/yourposts.php';

	} else if ($_GET['page'] == "profile") {

		include "views/footer.php";
		
	} else {
		include "views/body.php";

	}
}
//include "views/body.php";

?>