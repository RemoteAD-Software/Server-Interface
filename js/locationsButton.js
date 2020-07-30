function editButtonClicked(element) {
    var tr = element.parentElement.parentElement;

    var id = $.trim(tr.querySelector("#id").innerHTML);
    var name = $.trim(tr.querySelector("#name").innerHTML);
    var city = $.trim(tr.querySelector("#city").innerHTML);
    var street = $.trim(tr.querySelector("#street").innerHTML);
    var streetNumber = $.trim(tr.querySelector("#streetNumber").innerHTML);
    var postal = $.trim(tr.querySelector("#postal").innerHTML);
    var country = $.trim(tr.querySelector("#country").innerHTML);
    var description = $.trim(tr.querySelector("#description").innerHTML);

    open(id, name, city, street, streetNumber, postal, country, description);
}

function removeButtonClicked(element) {
    var tr = element.parentElement.parentElement;

    var id  = $.trim(tr.querySelector("#id").innerHTML);

    $.ajax({
        method: "POST",
        url: "backend/removeLocation.php",
        data: {
            "id": id
        }
    }).done(function(msg) {
        
        if(msg != "OK") {
            alert("Clients are still asigned to this location:\n" + msg);
        } else {
            sleep(50).then(() => {
                document.location.reload(true);
                return false;
            });
        }
    })


}