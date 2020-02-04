<?php
	function redirect($location) {
		header("Location: {$location}");
		ob_end_flush();
		exit();
	}
