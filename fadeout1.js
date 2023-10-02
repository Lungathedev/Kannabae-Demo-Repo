function removeFadeOut() {
    var seconds = 5000;
    document.getElementById("loader").style.transition = "opacity "+seconds+"s ease";
    document.getElementById("loader").style.opacity = 0;
    setTimeout(function() {
        document.getElementById("loader").parentNode.removeChild(document.getElementById("loader"));
    }, 2000);
}
removeFadeOut(document.getElementById('loader'), 2000);
