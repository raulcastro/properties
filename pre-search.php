<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once ($root . '/views/front/Layout_View.php');

	if ($_POST['submit'])
	{
		$term = $_POST['term'];
		
		if ($term)
		{
			$term = Tools::slugify($term);
			
			switch ($_POST['type'])
			{
				case 0:
					header('Location: search/in-all/site/'.$term.'/0');
					break;
			}	
		}
	}