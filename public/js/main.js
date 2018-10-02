$(document).ready(function(){
    //message alert 
    $("#alert_msg").fadeOut(3000);
   //modal update data
    $('#modalEditName').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var name = button.data('name') // Extract info from data-* attributes
        var location = button.data('location') // Extract info from data-* attributes
        // Update the modal's content.
        var modal = $(this)
        modal.find('.modal-body #input_id').val(id)
        modal.find('.modal-body #input_name').val(name)
        modal.find('.modal-body #input_location').val(location)
    })

    $('#modalInscription').on('show.bs.modal', function (event) {
        var url = window.location + '';
        url = url.split('/');
        url = url[url.length-1]
        var modal = $(this)
        modal.find('.modal-body #modalFormPageName1').val(url)
    })
    $('#modalConnexion').on('show.bs.modal', function (event) {
        var url = window.location + '';
        url = url.split('/');
        url = url[url.length-1]
        var modal = $(this)
        modal.find('.modal-body #modalFormPageName2').val(url)
    })
    $('#modalNewPassword').on('show.bs.modal', function (event) {
        var url = window.location + '';
        url = url.split('/');
        url = url[url.length-1]
        var modal = $(this)
        modal.find('.modal-body #modalFormPageName3').val(url)
    })
});