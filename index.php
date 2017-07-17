<?php

include "actions.php";

include "views/header.php";

if (isset($_GET['page'])) {
	
	if ($_GET['page'] == "yourposts") {

		include 'views/yourposts.php';

	} else if ($_GET['page'] == "search") {

		include 'views/search.php';

	} else  {

		include "views/body.php";
		
	} 
		
	include "views/footer.php";

}

?>