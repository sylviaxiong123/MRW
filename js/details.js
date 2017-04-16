(function() {
	"use strict";
	console.log("audio control");
	
	
	var myPlayer = document.querySelector("#myAudioPlayer"),
		pBar = document.querySelector('#prog'),
		togglePlay = document.querySelector("#playButton"),
		muteTrack = document.querySelector("#muteButton"),
		volSlider = document.querySelector("#volumeSlider"),
		volControlRemoved = false;
	
	
	// volumne controls, default setting
	volSlider.value = 100;

	// get the current video source
 	setTimeout(function(){
 		videoCurrentSource = myPlayer.currentSrc.toString();
	ext = videoCurrentSource.substr(videoCurrentSource.lastIndexOf("."));
	},500);
	

			

	// methods
	function controlVol() {
		myPlayer.volume=(volSlider.value / 100);
	}

	//switch toggles
	function playToggle() {
		togglePlay.classList.toggle("pauseMode");

		if(myPlayer.paused) {
			myPlayer.play();
		}else{
			myPlayer.pause();
		}
	}

	function trackMute() {
		if (volControlRemoved) {
			// tween volume back up
			console.log("tween vol up");
			this.classList.toggle("muteMode");
			TweenMax.to(myPlayer, 0.7, {volume:(volSlider.value / 100), onComplete:checkVol});
			volControlRemoved = false;
		} else {
			TweenMax.to(myPlayer, 0.7, {volume:0});
			myPlayer.removeEventListener("timeupdate", controlVol, false);
			this.classList.toggle("muteMode");
			volControlRemoved = true;
		}
	}

	function checkVol() {
		myPlayer.addEventListener("timeupdate", controlVol, false);
	}

	function toggleMuteClass() {
		muteTrack.classList.toggle("muteMode");
		myPlayer.removeEventListener("volumechange", toggleMuteClass, false);
	}
		

	function updateBar() {
		console.log("updateBar fired");
		var percent = Math.floor((100 / myPlayer.duration) * myPlayer.currentTime);

		// try to run what's in the brackets; if there's an error, catch / handle that without breaking the application
		try {
			pBar.value = percent;
		} catch(e) {
			console.log('caught a momentary non-critical error: ', e);
		}
		
	}
	
	
	//Listeners controls all the functions to work
	myPlayer.addEventListener("timeupdate", updateBar, false);
	myPlayer.addEventListener("timeupdate", controlVol, false);

	togglePlay.addEventListener("click", playToggle, false);
	muteTrack.addEventListener("click", trackMute, false);
	volSlider.addEventListener("change", controlVol, false);



	
	
	
	
	})();
