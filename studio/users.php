<?php
require_once 'core/init.php';

//Load the template into page
$template = new template;

// Load page scripts
echo $template->headerScripts();

//-----------------------------------------------------
// PAGE VARIABLES
//-----------------------------------------------------
$page = 'admin';
?>


<?php
//-----------------------------------------------------
// HEADER
//-----------------------------------------------------

// LH COLUMN
echo $template->lhcolumn();

// LH COLUMN
echo $template->header('<span class="fa fa-users"></span> Users');

//-----------------------------------------------------
// BODY
//-----------------------------------------------------

$sql = DB::getInstance()->query("SELECT * from `pd_MEMBERS`");


echo '<div id="bodyContent">
			<div class="row">
				<div class="module slot-0-1-2">
					<h2>Users</h2>

					<div class="grid userList" style="padding: 2REM;">
						<div class="row header">
							<div class="slot-1">Username</div>
							<div class="slot-2-3-4">Email</div>
							<div class="slot-5">Role</div>
						</div>
						
					';
				
				foreach($sql->results() as $data) { ?>
        		 	<div class="row">
        		 		<div class="slot-1"> <?php echo $data->pd_members_USERNAME ?> </div>
						<div class="slot-2-3-4"><?php echo $data->pd_members_EMAIL ?></div>
						<div class="slot-5">a</div>
					</div>
				<?php }
				echo '</div>';
					
		  echo '</div>
				<div class="module slot-3-4-5">
					<h2>Example title 2</h2>
					<ul>
						<li>Example content 1</li>
						<li>Example content 2</li>
						<li>Example content 3</li>
					</ul>
				</div>
			</div>
</div>';


//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
$footer = new footer();
//echo $footer->footer;