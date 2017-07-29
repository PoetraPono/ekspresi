function cek(source, name) {
   checkboxes = document.getElementsByName(name);
   for(var i=0, n=checkboxes.length;i<n;i++) {
      checkboxes[i].checked = source.checked;
   }
}

function konfirmasi() {
   if(jQuery('input[type=checkbox]:checked').length) {
      var conf = confirm('Apakah anda yakin akan menghapus data yang dipilih?');
      return conf;
   }
   else {
      alert('Belum ada data yang dipilih');
      return false;
   }
}

$("a.fullscreen").on('click', function() {
    var docElement, request;

    docElement = document.documentElement;
    request = docElement.requestFullScreen || docElement.webkitRequestFullScreen || docElement.mozRequestFullScreen || docElement.msRequestFullScreen;

    if(typeof request!="undefined" && request){
        request.call(docElement);
    }
});

$("a.fullscreenExit").on('click', function() {
    var docElement, request;

    docElement = document;
    request = docElement.cancelFullScreen|| docElement.webkitCancelFullScreen || docElement.mozCancelFullScreen || docElement.msCancelFullScreen || docElement.exitFullscreen;
    if(typeof request!="undefined" && request){
        request.call(docElement);
    }
});