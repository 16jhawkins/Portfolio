var audioPlayer = document.getElementById("myAudio");
audioPlayer.loop = true;
function toggleAudio(){
    if(audioPlayer.paused){
        audioPlayer.play();
        // Will probably change button img style in future to indicate if its playing or not
    }
    else{
        audioPlayer.pause();
        // Will probably change button img style in future to indicate if its playing or not
    }
}