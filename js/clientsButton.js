function editButtonClicked(element) {
    var tr = element.parentElement.parentElement;

    var id = $.trim(tr.querySelector("#id").innerHTML);
    var description = $.trim(tr.querySelector("#description").innerHTML);

    open(id, description);
}

function removeButtonClicked(element) {
    var tr = element.parentElement.parentElement;

    var id = $.trim(tr.querySelector('#id').innerHTML);

    $.ajax({
        method: "POST",
        url: "backend/removeClient.php",
        data: {
            "id": id
        }
    }).done(function(msg) {

        sleep(50).then(() => {
            document.location.reload(true);
            return false;
        });
    });
}