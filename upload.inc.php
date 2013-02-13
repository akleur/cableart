<section class="cableArtMain" id="cableArtUpload">
	<div class="row">
		<div class="eight columns">
			<form id="cableArtUploadForm" name="cableArtUploadForm" method="POST">

			<div id="cableArtFileUploader"></div>

			<div class="cableArtHint">
				<p>Please upload a picture (jpg format) in high quality but be aware of the 10 MB upload limit. All information is voluntary but you have to agree with our conditons of use.
				</p>
			</div>

			<label for="picNickname">Your name</label>
			<input type="text" id="picNickname" name="picNickname" placeholder="Bob Ross">

			<label for="picEmail">Your email</label>
			<input type="email" id="picEmail" name="picEmail" placeholder="yourname@example.com">

			<label for="picTitle">Title of the picture</label>
			<input type="text" id="picTitle" name="picTitle" placeholder="A beautiful picture">

			<label for="picLocation">Where did you shot the picture?</label>
			<input type="text" id="picLocation" name="picLocation" placeholder="Berlin">

			<div class="row">
				<div class="twelve columns">
					<label for="picAgreement" class="left inline">
					<input type="checkbox" id="picAgreement" name="picAgreement" required>
					I agree with the <span class="cableArtConditions has-tip tip-top">conditons of use</span> of my picture</label>
				</div>
			</div>		

		
			<div id="callback" class="alert-box alert"></div>
			
			<div class="button secondary has-tip tip-right" id="picSubmit" name="picSubmit" title="Please choose a file to upload first!">Submit your pic</div>	

			</form>

		</div>
		<div class="four columns">
			<div class="panel radius" id="cableArtConditionsPanel">
				<h4>Conditions of use</h4>
				<p>
				...
				</p>
				<p>
					<a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/" target="_blank"><img alt="Creative Commons Lizenzvertrag" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png" /></a>
				</p>
			</div>
		</div>
	</div>
</section>