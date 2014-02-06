<?php
require_once '../core/init.php';

//Load the template into page
$template = new template;

// Load page scripts
echo $template->headerScripts();

//-----------------------------------------------------
// PAGE VARIABLES
//-----------------------------------------------------
$page = 'win';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$compid = $_GET['id'];
} else {
	header("location:../error404.php");
}

//-----------------------------------------------------
// PAGE SQL QUERY
//-----------------------------------------------------

$sql = DB::getInstance()->query("select * from comps WHERE comps_ID = '$compid'");
		$sqlData = $sql->results();
		foreach( $sql->results() as $data ) {
			$sqlTitle 					= $data->comps_TITLE;
			$sqlDESCRIPTION 			= $data->comps_DESCRIPTION;
			$sqlCLOSINGDATE 			= $data->comps_CLOSINGDATE;
			$sqlFIRSTPRIZE	 			= $data->comps_FIRSTPRIZE;
			$sqlRUNNERSUPPRIZES 		= $data->comps_FIRSTPRIZE;
			$sqlWINNERTEXT 				= $data->comps_WINNERTEXT;
			
			$sqlBANNERIMG 				= $data->comps_BANNERIMG;			// BANNER IMAGES
			$sqlENTRYINSTRUCTIONS 		= $data->COMPS_ENTRYINSTRUCTIONS; 	// ENTRY INSTRUCTIONS

			$sqlGALLERYLINK				= $data->comps_GALLERYLINK;
		}
		$sqlCLOSINGDATE2 = strtotime($sqlCLOSINGDATE); 
?>


<?php
//-----------------------------------------------------
// HEADER
//-----------------------------------------------------
	// Advertising banner
	echo $template->advertBanner();

	// NAV
	echo $template->nav();

	//HEADER - this is the part with the section title, background graphic and main banner
	$header = new header($page);

	echo '<section>';
	echo '<div id="sectionHeader" style="width: 100%; background: url(\'' . config::get("url/baseurl") . 'images/' . $page . '/' .$header->sectionBGIMAGE.'\') ">'
			.'<div class="grid">'
				.'<div class="row">'
					.'<div class="slot-6-7-8">'
						.'<div class="sectionTitle" style="background: url(\''. config::get("url/baseurl") . 'images/' . $page . '/'. $header->sectionICON .'\';">'.$header->sectionNAME.'</div>'
						.'<a href="" class="sectionBanner">'
							.'<img src="' . config::get("url/baseurl") . 'images/' . $page . '/' .$sqlBANNERIMG.'">'
						.'</a>'
					.'</div>' // .slot-0-1-2-3
					.'<div class="slot-9 featuredInstructions" style="background-image:url(\'' . config::get("url/baseurl") . 'images/' . $page . '/featuredInstructions.png\')" />'
						.'<div class="featuredContent">
							<h2>HOW?</h2>
							<p>'.$sqlENTRYINSTRUCTIONS.'</p>
						</div>'
					.'</div>' // .slot-4-5
				.'</div>' // .row
			.'</div>' // .grid
		.'</div>';




//-----------------------------------------------------
// BODY
//-----------------------------------------------------

echo '<div id="bodyArea" class="enterCompetition" style="background-color:#'. $header->sectionHEX .'; background-image: url(\''. config::get("url/baseurl") . 'images/bgbodychequered.png'  . '\');">
		<div class="grid">
			<div class="row">
				<div class="slot-0-1-2-3 enterCompetition">
				
				<div class="termsAndConditions">
					<a href="#" class="closeTerms">Enter Competition</a>
					<ol>
						<li>The competition is open to residents of the UK only.</li>
						<li>Continuous monthly prize draw. Winners selected from all activity sheet drawings received the previous month. Prize pack contents and movie title subject to change.</li>
						<li>The winning entries will be drawn on '.$sqlCLOSINGDATE.'</li>
						<li>One entry per person.</li>
						<li>No purchase necessary.</li>
						<li>The first prize is:&nbsp;
						'.$sqlFIRSTPRIZE;

						// RUNNERS UP PRIZES
						if (isset($sqlRUNNERSUPPRIZES) && !empty($sqlRUNNERSUPPRIZES)) {
							echo '<li>Runners up prizes are:<br />'
									. $sqlRUNNERSUPPRIZES . 
								'</li>';
						}

				echo '  <li>There is no cash substitute and the prize is non refundable.</li>
						<li>The prize is non transferable.</li>
						<li>The Promoter reserves the right to substitute the prize for one of equal or greater value.</li>
						<li>The winning entrants will be randomly selected by an independent judge from all completed entries and notified by phone or email.</li>
						<li>Please allow 28 days for appropriate prizes to be delivered.</li>
						<li>Winners must respond to the promoter within 14 days of being contacted. </li>
						<li>Winners that respond after that period, will not be eligible for the prize.</li>
						<li>The promoter reserves the right to withdraw the competition if is felt that it has been in any way fraudulently entered.</li>
						<li>The judge\'s decision is final and no correspondence will be entered into.</li>
						<li>By accepting the prize the winners agree to be bound by these terms and conditions.</li>
						<li>The winner\'s names and locations will be available by sending a SAE marked '.$sqlWINNERTEXT.' to the Promoter BEFORE 4 weeks after the closing date.</li>
						<li>We will not post personal data (as deﬁned in the Data Protection Act 1998) in relation to entrants who are under the age of 16 on the website or anywhere else, without the permission of that entrant\'s parent or guardian. In the event of permission being granted, we may use, in any and all media, your name, approved photographs and/or recordings, any statement made by you, without payment or further consent. We may also require you to take part in such publicity without payment or further consent and such publicity will be owned by the promoter forever.</li>
						<li>The Promoter is Play7</li>
					</ol>
					<a href="#" class="closeTerms">Enter Competition</a>
				</div>

				
					<div class="bodyTitle">'. $sqlTitle .'</div>
					<div class="bodyDescription">'. $sqlDESCRIPTION . '</div>
					
					<div id="success" style="display: none;">
						&#10004; image uploaded!
					</div>

					<div id="mulitplefileuploader" class="bodyUploadBtn">
						<img src="'. config::get("url/baseurl") . 'images/' . $page . '/icon_uparrow.png" width="27" height="27" /> CLICK HERE TO UPLOAD
					</div>
					<div id="status"></div>
				
				<form id="enterCompetitionForm" method="post" action="post.enter.php">	

					<div class="row">
						<div class="slot-0-1">
							
							<input type="hidden" name="inputFile" id="uploadedFile" />
							
							<label for="inputName">CHILD&apos;S NAME</label>
							<input class="required" type="text" name="inputName" placeholder="CHILD\'S NAME"  />
						</div>
						<div class="slot-2-3">
							<label for="inputParentsName">PARENT&apos;S NAME</label>
							<input type="text" name="inputParentsName" placeholder="PARENT\'S NAME" class="required" />
						</div>
					</div><!- end .row ->
					<div class="row">
						<div class="slot-0-1">
							<label for="inputParentsEmail">PARENT&apos;S EMAIL</label>
							<input type="text" name="inputParentsEmail" placeholder="PARENT\'S EMAIL" class="required" />
						</div>
						<div class="slot-2-3">
							<label for="inputParentsPostcode">POSTCODE</label>
							<input type="text" name="inputParentsPostcode" placeholder="POSTCODE" class="required" />
						</div>
					</div><!- end .row ->		
					<div class="row">
						<div class="slot-0-1">
							<input type="submit" value="SUBMIT" class="bodyUploadBtn" style="margin: 0;">
						</div>
						<div class="slot-2-3">
							<input type="checkbox" name="inputTerms" id="chckboxTerms" class="required" />
							
							<label for="inputTerms" >I have read the <a href="#" class="inputTermsandConditions">terms & conditions</a></label><br />
							<span>Closing date: '. date("m/d/y", $sqlCLOSINGDATE2).'</span>
						</div>
					</div><!- end .row ->					
				</form>
				';

echo		'	</div>
				<div class="slot-4-5" id="rhColumn" style="box-sizing: border-box;">
					<div class="rhTopButtons">
						<a href="#" class="btnTermsandConditions">Terms and Conditions</a>
					</div>';

					if(isset($sqlGALLERYLINK) && !is_null($sqlGALLERYLINK)) {
						echo '<a href="'. config::get("url/baseurl") . '/gallery_item.php?id='.$sqlGALLERYLINK.'" class="btnViewGallery">View Gallery</a>';
					}

				'</div>
			</div> <!-- end .row ->
		</div> <!-- End grid -->
	 </div>';




//-----------------------------------------------------
// FOOTER
//-----------------------------------------------------
	 
echo '</section>';
$footer = new footer('', $compid);
echo $footer->footer;