$(document).ready(function() {
    $('.popupWrapper').css('visibility','hidden');
});

function open(id, name, city, street, streetNumber, postal, country, description) {
    $('.popupWrapper').css('visibility','visible');
    $('body').append('<link rel="stylesheet" type="text/css" href="css/editLocation.css">');

    var allElements = document.getElementsByTagName('*');

    var index;
    for(index = 0; index < allElements.length; index++) {
        var element = allElements[index];
        if(!element.classList.contains('noBlur')) {
            if(element.nodeName != 'BODY' && element.nodeName != 'HTML') {
                element.classList.add("blur");
            }
        }
    }

    var form = document.getElementById('editForm');

    document.getElementById('submit').addEventListener('click', function() {
        $.ajax({
            method: "POST",
            url: "backend/editLocations.php",
            data: {
                "id": form.querySelector('#id').value,
                "name": form.querySelector('#name').value,
                "city": form.querySelector('#city').value,
                "street": form.querySelector('#street').value,
                "streetNumber": form.querySelector('#streetNumber').value,
                "postal": form.querySelector('#postal').value,
                "country": form.querySelector('#country').value,
                "description": form.querySelector('#description').value
            }
        }).done(function(msg) {
            console.log(msg);
        })

        $('.popupWrapper').css('visibility','hidden');

        var index;
        for(index = 0; index < allElements.length; index++) {
            var element = allElements[index];
            if(!element.classList.contains('noBlur')) {
                if(element.nodeName != 'BODY' && element.nodeName != 'HTML') {
                    element.classList.remove("blur");
                }
            }
        }

        sleep(50).then(() => {
            console.log("TEST");
            document.location.reload(true);
            return false;
        });
 
    });

    var form = document.getElementById("editForm");
    form.querySelector("#name").value = name;
    form.querySelector("#city").value = city;
    form.querySelector("#street").value = street;
    form.querySelector("#streetNumber").value = streetNumber;
    form.querySelector("#postal").value = postal;
    form.querySelector("#country").value = country;
    form.querySelector("#description").value = description;
    form.querySelector("#id").value = id;
}

function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
  }