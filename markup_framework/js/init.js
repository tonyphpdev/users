$(document).ready(function() {

    // forms validate
    if($('.validate').length) {
        $('.validate').liValidForm({
            captcha: 'code'
        });
    }

    // detect transit support
    var transitFlag = true;
    if(!Modernizr.cssanimations) {
        transitFlag = false;
    }

    // popup windows
    function showForm(formElem) {
        $(".popup-overlay").fadeIn(fadeSpeed);
        $(formElem).css({
            "margin-top": "-" + ($(formElem).height() / 2) + "px",
            "top": ($(window).height() / 2) + $(window).scrollTop() + "px"
        }).fadeIn(fadeSpeed);
    }
    function hideForm() {
        $(".popup-overlay").fadeOut(fadeSpeed);
        $(".popup-wrapper").fadeOut(fadeSpeed);
    }

    // google maps init
    /*function loadGoogleMap(mapID, lat, lng) {

        var myLatlng = new google.maps.LatLng(lat, lng);
        var myMarPos = new google.maps.LatLng(lat, lng);

        var myOptions = {
            zoom: 17,
            scrollwheel: false,
            center: myLatlng,
            disableDefaultUI: true,
            navigationControl: true,
            navigationControlOptions: {
                style: google.maps.NavigationControlStyle.ZOOM_PAN
            },

            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
            },
            streetViewControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById(mapID), myOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            icon: "img/map-pointer.png",
            animation: google.maps.Animation.DROP,
            title: "TITLE"
        });
	
	google.maps.event.addListener(marker, 'click', function () {
	    infowindow.open(map, marker);
	});
    }*/
});