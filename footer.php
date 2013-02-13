<footer>
	<div class="row">
		<div class="twelve columns">
			<img src="images/heilandart_logo_small.png" alt="HEILANDART" class="cableArtHeiLogo">
			<p>cableArt is a project from <a href="http://www.heilandart.de" target="_blank">HEILANDART</a></p>
		</div>
	</div>
</footer>

</div>


<script type="text/javascript" src="/min/b=cableart/javascripts/foundation&amp;f=jquery.js,jquery.foundation.alerts.js,jquery.foundation.buttons.js,jquery.foundation.clearing.js,jquery.foundation.forms.js,jquery.foundation.mediaQueryToggle.js,jquery.foundation.navigation.js,jquery.foundation.orbit.js,jquery.foundation.tooltips.js,jquery.foundation.topbar.js,jquery.placeholder.js,jquery.fineuploader-3.1.js"></script>

<!--	
	<script src="javascripts/foundation/jquery.js"></script>
	<script src="javascripts/foundation/jquery.cookie.js"></script>	
	<script src="javascripts/foundation/jquery.event.move.js"></script>	
	<script src="javascripts/foundation/jquery.event.swipe.js"></script>	
	<script src="javascripts/foundation/jquery.foundation.accordion.js"></script>
	<script src="javascripts/foundation/jquery.foundation.joyride.js"></script>
	<script src="javascripts/foundation/jquery.foundation.magellan.js"></script>
	<script src="javascripts/foundation/jquery.foundation.reveal.js"></script>
	<script src="javascripts/foundation/jquery.foundation.tabs.js"></script>

	<script src="javascripts/foundation/jquery.foundation.alerts.js"></script>	
	<script src="javascripts/foundation/jquery.foundation.buttons.js"></script>	
	<script src="javascripts/foundation/jquery.foundation.clearing.js"></script>	
	<script src="javascripts/foundation/jquery.foundation.forms.js"></script>	
	<script src="javascripts/foundation/jquery.foundation.mediaQueryToggle.js"></script>	
	<script src="javascripts/foundation/jquery.foundation.navigation.js"></script>	
	<script src="javascripts/foundation/jquery.foundation.orbit.js"></script>	
	<script src="javascripts/foundation/jquery.foundation.tooltips.js"></script>	
	<script src="javascripts/foundation/jquery.foundation.topbar.js"></script>	
	<script src="javascripts/foundation/jquery.placeholder.js"></script>
	
  	<script src="javascripts/foundation/jquery.fineuploader-3.1.js"></script>

-->	

<script src="javascripts/foundation/glisse.js"></script>
  	
  	<script>

  	function cableArtNavi(url) {
  	/*	$('section.cableArtMain').hide();	
  		var urlGoal = "section#cableArt" + url;
  		$(urlGoal).show();
  	*/
  		$('nav a').removeClass('active');
  		$('.nav-bar > li').removeClass('active');
  		$("#cableArtLink" + url).addClass('active');
  	}



  	$(document).ready(function () {

      if ($('#cableArtGallery').length > 0) {
        $('.cableArtPic').glisse({changeSpeed: 550, fullscreen: false}); 
      }

  		$("#cableArtSlider").orbit({pauseOnHover: true, bullets: true});


  		if ($('#cableArtUpload').length > 0) {

  			var cableArtConditions = {
  				text: "Your picture will be published under the Creative Commons by-sa license: everybody is allowed to share - to copy, distribute and transmit the work, to remix - to adapt the work, to make commercial use of the work.",
  				width: 200
  			};


  			$('#cableArtConditionsPanel p:first').html(cableArtConditions.text);
  			$('.cableArtConditions').attr('title', cableArtConditions.text);
  			$('.cableArtConditions').attr('data-width', cableArtConditions.width);

  			var cableArtUploader = $('#cableArtFileUploader').fineUploader({
  				request: {
  					endpoint: 'php/formupload.php',
  					paramsInBody: true,
  					params: {
  						picNickname: function() {
  							return $('#picNickname').val();
  						},
  						picEmail: function() {
  							return $('#picEmail').val();
  						},
  						picTitle: function() {
  							return $('#picTitle').val();
  						},
  						picLocation: function() {
  							return $('#picLocation').val();
  						},
  						picTitle: function() {
  							return $('#picTitle').val();
  						}
  					}
  				},
  				text: {
  					uploadButton: 'Click or drop your file here',
  					dragZone: 'Click or drop your file here',
  					cancelButton: 'Remove file'
  				},

  				template: '<div class="qq-uploader twelve">' +
  				'<div class="qq-upload-drop-area button success" style="display: none">{dragZoneText}</div>' +
  				'<div class="qq-upload-button button">{uploadButtonText}</div>' +
  				'<span class="qq-drop-processing"><span>{dropProcessingText}</span><span class="qq-drop-processing-spinner"></span></span>' +
  				'</div>' +
  				'<ul class="qq-upload-list"></ul>',
  				classes: {
  					success: 'alert-box success',
  					fail: 'alert-box alert'
  				},
  				validation: {
			//	allowedExtensions: ['jpeg','jpg'],
			acceptFiles: 'image/*'
		},
		showMessage: function(message) {
			$('#cableArtFileUploader').append('<div class="alert-box alert">' + message + '</div>');
		},
		failedUploadTextDisplay: {
			mode: 'custom',
			maxChars: 500,
			responseProperty: 'error'
		},
		debug: true,
		multiple: false,
		autoUpload: false
	}).on('complete', function(event, id, fileName, responseJSON) {
		if (responseJSON.success) {
			var picPath = "uploads/thumbs/" + fileName;
			$(this).append('<div class="two cableArtFileUploaderThumb"><img src="' + picPath +'" alt="' + fileName + '"></div><div id="cableArtFileUploaderSuccess" class="alert-box success">Upload complete</div>');
		}
	}).on('submit', function(event, id, filename) {
		$('.cableArtFileUploaderThumb').remove();
		$('#cableArtFileUploaderSuccess').remove();
		$('#picSubmit').removeClass('has-tip').click(function() {
			if ($('#picAgreement').attr('checked') == 'checked') {
				$('html, body').animate({
					scrollTop: $("#cableArtFileUploader").offset().top
				}, 1000);
				$('#callback').hide('slow');
				cableArtUploader.fineUploader('uploadStoredFiles');
			}
			else {
				$('#callback').html('Please accept our conditions of use');
				$('#callback').show('slow');
			}
		});
	});
}

  	});

  	</script>

  	<script src="javascripts/foundation/app.js"></script>