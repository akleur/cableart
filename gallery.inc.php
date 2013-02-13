<section class="cableArtMain" id="cableArtGallery">
	<div class="row">
		<div class="eight columns">
			<p>
				<ul class="block-grid three-up mobile-two-up gallery">
				<?php

					$query_gal = "SELECT * FROM cableart WHERE picActive='J' ORDER BY picUploaddate DESC";
					$res_gal = mysql_query($query_gal);	

					while($row_gal = mysql_fetch_array($res_gal)) {
						extract($row_gal);

						$picCaption = "";

						if ($picNickname != "") {
							$picCaption .= $picNickname;
						}

						if ($picTitle != "") {
							$picCaption .= " - ".$picTitle;
						}

						if ($picLocation != "") {
							$picCaption .= " - ".$picLocation;
						}

					//	echo '<li><a href="uploads/medium/'.$picFilename.'"><img data-caption="'.$picCaption.'" src="uploads/thumbs/'.$picFilename.'"></a></li>'."\n";
						echo '<li><img data-glisse-big="uploads/medium/'.$picFilename.'" rel="group1" title="'.$picCaption.'" src="uploads/thumbs/'.$picFilename.'" class="cableArtPic"></li>'."\n";
					}
				?>
				</ul>
			</p>
		</div>
		<div class="four columns">
		</div>
	</div>
</section>