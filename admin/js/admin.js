$('#toggler').on('click', function () {
    $('#sidebar').toggleClass('open-nav');
    $('#overlay').fadeToggle();
})

$('#overlay').on('click', function(){
    $('#toggler').trigger('click');
});



$('#pass_eyes').on('click', function () {
    $first_state = $('#pass').attr('type');
    if($first_state === 'password'){
        $('#pass').attr('type', 'text');
        $('#pass_eyes span').html('<i class="fa fa-eye"></i>')
    }else{
        $('#pass').attr('type', 'password');
        $('#pass_eyes span').html('<i class="fa fa-eye-slash"></i>') 
    }
    console.log($first_state);
})

$(document).ready( function () {
    $('#schtoggle').on('click', function () {
        $('#search').toggle();
    })
})