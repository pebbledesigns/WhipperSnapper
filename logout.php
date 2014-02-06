<?php
session_start();
session_destroy();

if(!isset($_SESSION['agegate'])) {
				echo 'unset';
			} 