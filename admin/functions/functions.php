<?php
// Secure HTML Input
function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

// Include Scripts From Root Path
function includeScript($path) {
	return include $_SERVER['DOCUMENT_ROOT'] . "/cube/{$path}";
}

// Path To Root Directory
function root($path) {
	return $_SERVER['DOCUMENT_ROOT'] . "/cube/{$path}";
}

// absulot path used in links
function linkto($path) {
	echo "/cube/admin/{$path}";
}

//Print Success Message Style
function Success ($message) {
	echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
			<span aria-hidden=\"true\">&times;</span>
			</button>
			{$message}
		</div>" ;
}

//Print Error Message Style
function Danger($message) {
	echo "<div class=\"alert alert-danger alert-dismissible show fade in\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
			<span aria-hidden=\"true\">&times;</span>
			</button>
			{$message}
		</div>" ;
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

$INC_DIR = $_SERVER['DOCUMENT_ROOT'] . "/cube/admin/includes/";