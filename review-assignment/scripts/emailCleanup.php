<?php
    $emails = ["a@b.com", null, "ab.com", "   a@c.com", "b@c.com  ", "", "d@e .com", "f@g.com", "yahoo.com", "g@h.com"];
    for ($i = 0; $i < sizeOf($emails); $i++) {
    	if ($emails[$i] && strlen($emails[$i]) > 0 && str_contains($emails[$i], "@")) {
    		$emails[$i] = str_replace(" ", "", $emails[$i]);
    	} else {
    		unset($emails[$i]);
    	}
    }
    sort($emails);
	
	foreach($emails as $email) {
		    		echo "$email\n";

	}
?>