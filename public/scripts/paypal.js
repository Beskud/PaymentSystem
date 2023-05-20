
 $(document).ready(function() {

  $('.download').click(function() {
    $.ajax({
      method: "POST",
      url: "/download",
      data: { product_id: this.id}
    })
      .done(function( data ) {

        if( data.status == 'success') {
          window.location.href = data.data
        }
      });
  });
});