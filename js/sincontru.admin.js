jQuery (document).ready(function($) {
  var mediaUploader;

  $("#upload-button").on('click',function(e) {
    e.preventDefault();
    if (mediaUploader) {
      mediaUploader.open();
      return;
    }

    mediaUploader = wp.media({
      title: 'Choose a profile picture',
      button: {
        text: 'Choose Picture'
      },
      multiple: false
    });
    mediaUploader.on('select', function(){
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#profile-picture').val(attachment.url);
    });
    mediaUploader.open();
  });
});
