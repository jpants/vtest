function populate_table(resp) {
  var table = '<table class="highlight centered">'+
                '<thead>'+
                  '<tr>'+
                    '<th>First Name</th>'+
                    '<th>Last Name</th>'+
                    '<th>Email</th>'+
                  '</tr>'+
                '</thead>'+
                '<tbody>';

  resp.forEach(function(c) {
    var email = '';
    var cIdentities = c['identity-profiles'][0].identities;
    cIdentities.forEach(function(ident) {
      if ( ident.type === 'EMAIL' ) {
        email = ident.value;
      }
    });

    var fn = c.properties.firstname.value;
    var ln = c.properties.lastname.value;

    table +=  '<tr>'+
                '<td>'+fn+'</td>'+
                '<td>'+ln+'</td>'+
                '<td>'+email+'</td>'+
              '</tr>';
  });

  table += '</tbody>'+
          '</table>';

  return table;
}

function hs_ajax(nonce) {
  // var nonce = $(this).attr("data-nonce");

  jQuery.ajax({
    type: "get",
    dataType: "json",
    url: myAjax.ajaxurl,
    data: { action: "my_hs_users", nonce: nonce }
  }).done( function (response) {
    // console.log('done');
    jQuery(".table-wrap").html(populate_table(response.contacts));
  }).fail(function ( jqXHR, textStatus, errorThrown ) {
    console.log(jqXHR);
    console.log(textStatus);
    console.log(errorThrown);
  });
  
}
