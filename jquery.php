//Correr o ajax dos tabs em jquery apenas uma vez

$( "#tabs" ).tabs({
  beforeLoad: function( event, ui ) {
    if ( ui.tab.data( "loaded" ) ) {
      event.preventDefault();
      return;
    }

    ui.jqXHR.success(function() {
      ui.tab.data( "loaded", true );
    });
  }
});

