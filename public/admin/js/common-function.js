//Function to show hide password
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });

    //For tables
    $('#table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });


});




//Delete state show popup function
function state_confirm_delete(state_id) {
    var delete_url = $('#delete-state').attr('href');
    delete_url = delete_url.replace(/\d+/g, '') + state_id;
    $('#delete-state').attr('href', delete_url);
    $('#modal-state-delete').modal('show');
}
//Function for show restore popup for state
function state_confirm_restore(state_id) {
    var restore_url = $('#restore-state').attr('href');
    restore_url = restore_url.replace(/\d+/g, '') + state_id;
    $('#restore-state').attr('href', restore_url);
    $('#modal-state-restore').modal('show');
}



//Delete category show popup function
function category_confirm_delete(category_id) {
    var delete_url = $('#delete-category').attr('href');
    delete_url = delete_url.replace(/\d+/g, '') + category_id;
    $('#delete-category').attr('href', delete_url);
    $('#modal-category-delete').modal('show');
}
//Function for show restore popup for category
function category_confirm_restore(category_id) {
    var restore_url = $('#restore-category').attr('href');
    restore_url = restore_url.replace(/\d+/g, '') + category_id;
    $('#restore-category').attr('href', restore_url);
    $('#modal-category-restore').modal('show');
}


//Delete city show popup function
function city_confirm_delete(city_id) {
    var delete_url = $('#delete-city').attr('href');
    delete_url = delete_url.replace(/\d+/g, '') + city_id;
    $('#delete-city').attr('href', delete_url);
    $('#modal-city-delete').modal('show');
}
//Function for show restore popup for city
function city_confirm_restore(city_id) {
    var restore_url = $('#restore-city').attr('href');
    restore_url = restore_url.replace(/\d+/g, '') + city_id;
    $('#restore-city').attr('href', restore_url);
    $('#modal-city-restore').modal('show');
}



//Delete type show popup function
function type_confirm_delete(type_id) {
    var delete_url = $('#delete-type').attr('href');
    delete_url = delete_url.replace(/\d+/g, '') + type_id;
    $('#delete-type').attr('href', delete_url);
    $('#modal-type-delete').modal('show');
}
//Function for show restore popup for type
function type_confirm_restore(type_id) {
    var restore_url = $('#restore-type').attr('href');
    restore_url = restore_url.replace(/\d+/g, '') + type_id;
    $('#restore-type').attr('href', restore_url);
    $('#modal-type-restore').modal('show');
}



//Delete sub category show popup function
function sub_category_confirm_delete(sub_category_id) {
    var delete_url = $('#delete-sub_category').attr('href');
    delete_url = delete_url.replace(/\d+/g, '') + sub_category_id;
    $('#delete-sub_category').attr('href', delete_url);
    $('#modal-sub_category-delete').modal('show');
}
//Function for show restore popup for type
function sub_category_confirm_restore(sub_category_id) {
    var restore_url = $('#restore-sub_category').attr('href');
    restore_url = restore_url.replace(/\d+/g, '') + sub_category_id;
    $('#restore-sub_category').attr('href', restore_url);
    $('#modal-sub_category-restore').modal('show');
}



//Delete service show popup function
function service_confirm_delete(service_id) {
    var delete_url = $('#delete-service').attr('href');
    delete_url = delete_url.replace(/\d+/g, '') + service_id;
    $('#delete-service').attr('href', delete_url);
    $('#modal-service-delete').modal('show');
}
//Function for show restore popup for service
function service_confirm_restore(service_id) {
    var restore_url = $('#restore-service').attr('href');
    restore_url = restore_url.replace(/\d+/g, '') + service_id;
    $('#restore-service').attr('href', restore_url);
    $('#modal-service-restore').modal('show');
}



//Delete service description show popup function
function service_description_confirm_delete(service_description_id) {
    var delete_url = $('#delete-service_description').attr('href');
    delete_url = delete_url.replace(/\d+/g, '') + service_description_id;
    $('#delete-service_description').attr('href', delete_url);
    $('#modal-service_description-delete').modal('show');
}
//Function for show restore popup for service description
function service_description_confirm_restore(service_description_id) {
    var restore_url = $('#restore-service_description').attr('href');
    restore_url = restore_url.replace(/\d+/g, '') + service_description_id;
    $('#restore-service_description').attr('href', restore_url);
    $('#modal-service_description-restore').modal('show');
}


//Delete service plan show popup function
function service_plan_confirm_delete(service_plan_id) {
    var delete_url = $('#delete-service_plan').attr('href');
    delete_url = delete_url.replace(/\d+/g, '') + service_plan_id;
    $('#delete-service_plan').attr('href', delete_url);
    $('#modal-service_plan-delete').modal('show');
}
//Function for show restore popup for service plan
function service_plan_confirm_restore(service_plan_id) {
    var restore_url = $('#restore-service_plan').attr('href');
    restore_url = restore_url.replace(/\d+/g, '') + service_plan_id;
    $('#restore-service_plan').attr('href', restore_url);
    $('#modal-service_plan-restore').modal('show');
}



//Delete partner plan show popup function
function partner_confirm_delete(partner_id) {
    var delete_url = $('#delete-partner').attr('href');
    delete_url = delete_url.replace(/\d+/g, '') + partner_id;
    $('#delete-partner').attr('href', delete_url);
    $('#modal-partner-delete').modal('show');
}
//Function for show restore popup for partner
function partner_confirm_restore(partner_id) {
    var restore_url = $('#restore-partner').attr('href');
    restore_url = restore_url.replace(/\d+/g, '') + partner_id;
    $('#restore-partner').attr('href', restore_url);
    $('#modal-partner-restore').modal('show');
}










