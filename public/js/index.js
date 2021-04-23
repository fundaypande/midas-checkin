 // Edit data
$('#btn-save-pickup').on('click', function () {
   var hotelName    = $('#input-hotel-name').val();
   var hotelAddress = $('#input-hotel-address').val();

   $('#from-field').val('Hotel '+hotelName);
    $('#from-field-id').val(1);
    element = $('#modal-from');
    UIkit.modal(element).hide();
});


$('#btn-search-speedboat').on('click', function (){
    $(this).addClass('is-loading');

    lokasi    = $('#from-field-id').val();
    tujuan    = $('#to-field-id').val();
    tanggal   = $('#date-field').val();
    return_id = $('input:checked').val();
    adult     = $('#adult-form').val();
    children  = $('#children-form').val();

    $.ajax({
        url: urlSearch + '/' +lokasi + '/' + tujuan + '/' + adult + '/' + children + '/' + return_id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#btn-search-speedboat').removeClass('is-loading');
            $('#speedboat-result').empty();
            
            var position = $('#speedboat-result').offset().top;

            $("body, html").animate({
                scrollTop: position
            } /* speed */ );

            console.log(data);
            if(data.length == 0){
                $('#speedboat-result').append('<br><br>');
                $('#speedboat-result').append('<h4>No Result . . . </h4>');
            } else {
                $('#speedboat-result').append('<br><br>');
                for (let i = 0; i < data.length; i++) {
                    var adultPrice = data[i]['adult_price'];
                    var childrenPrice = data[i]['children_price'];
                    var discount = data[i]['discount_percent'];

                    var realValue = (adultPrice*adult) + (childrenPrice*children);
                    var discountValue = (discount/100)*realValue; 
                    var priceAfterDiscount = realValue - discountValue;

                    var diskon = '';
                    var coret = '';
                    if(data[i]['discount_percent'] != '0'){
                        diskon = ' <div class="nde-discount-result"> <span class="nde-discount-value">'+ data[i]['discount_percent'] +'%</span> <span class="nde-discount-off">OFF</span> </div>';
                        coret  = '<span class="nde-discount-text" style="text-decoration: line-through red; font-size: 13px;"> '+ data[i]['currency'] +' '+ realValue +' </span>';
                    }
                    // $('#speedboat-result').append('<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid> <div class="uk-card-media-left uk-cover-container"> <img src="'+ data[i]['images'] +'" alt="" uk-cover> <canvas width="300" height="175"></canvas> </div> <div> <div class="uk-card-body"> <h3 class="uk-card-title">'+ data[i]['trademark'] +'</h3> <p>From '+ data[i]['departed'] +' To '+ data[i]['destination'] +'</p> <button onclick="openOrder('+ data[i]['id'] +')" class="uk-button uk-button-primary">BOOK NOW</button> </div> </div> </div> ')
                    $('#speedboat-result').append('<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid> <div class="uk-card-media-left uk-cover-container nde-media-result"> '+ diskon +' <img src="'+ data[i]['images'] +'" alt="" uk-cover> <canvas width="300" height="175"></canvas> </div> <div> <div class="uk-card-body"> <h3 class="uk-card-title nde-result-title">'+ data[i]['trademark'] +'</h3> <p class="nde-result-desc">From '+ data[i]['departed'] +' To '+ data[i]['destination'] +' - '+ data[i]['available_seat'] +' Seat Available</p> <div class="nde-price-book"> <div class="columns"> <div class="column"> <ul uk-accordion> <li> <a class="uk-accordion-title" href="#">Features</a> <div class="uk-accordion-content"> '+ data[i]['features'] +'</div> </li> </ul> </div> <div class="column"> <div class="columns is-mobile" style="padding-bottom: 0px; margin-bottom: 3px;"> <div class="column nde-price-text" style="padding-bottom: 0px;"> '+ data[i]['currency'] +' '+ priceAfterDiscount +' </div> <div id="discount-section" class="column" style="padding-bottom: 0px;">  '+  coret +'  </div> </div> <button style="width: 100%" onclick="openOrder('+ data[i]['speed_boat_id'] +')" class="uk-button uk-button-primary">BOOK NOW</button> </div> </div> </div> </div> </div> </div> '); 
                }
            }
            
        },
        error: function(error) {
          console.log('ERROR GET SEARCH DATA');
          $('#btn-search-speedboat').removeClass('is-loading');
        },
      });
    
});
