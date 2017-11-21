<?php
// server should keep session data for AT LEAST 0,5 hour
ini_set('session.gc_maxlifetime', 1800);
// each client should remember their session id for EXACTLY 0,5 hour
session_set_cookie_params(1800);
session_start();
?>