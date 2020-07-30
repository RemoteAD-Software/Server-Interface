$(document).ready(function() {
    $('.popupWrapper').css('visibility', 'hidden');
});

function open(id, description) {
    $('.popupWrapper').css('visibility', 'visible');
    $('body').append('<link rel="stylesheet" type="text/css" href="css/editItem.css">');

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
            url: "backend/editClients.php",
            data: {
                "id": form.querySelector('#id').value,
                "description": form.querySelector('#description').value,
                "location": form.querySelector('#location').value
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
             document.location.reload(true);
             return false;
        });
    });

    document.getElementById('close').addEventListener('click', function() {
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

        return false;
    });

    var form = document.getElementById('editForm');
    form.querySelector("#id").value = id;
    form.querySelector("#description").value = description;
}

function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}