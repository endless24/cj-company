// admin sidebar slidder
$('#toggler').on('click', function () {
    $('#sidebar').toggleClass('open-nav');
    $('#overlay').fadeToggle();
})

$('#overlay').on('click', function(){
    $('#toggler').trigger('click');
});


// login and register eye toggle
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

// pages
$(document).ready(function(){
    // Get the page url when the document is ready(loaded fully)
    var page2load = '';
    var current_page = window.location.hash
    if(current_page == null || current_page == ''){
        page2load = 'dashboard';
    }else{
        for (i = 1; i < current_page.length ; i++) {
            page2load += current_page[i];        
        }
    }

    // Create a function that loads the page dynamically
    function loadPage(page) {
        $.ajax({
            type: 'get',
            // url: 'pages/' + page + '.php',
            url: `pages/${page}.php`,
            dataType: 'html',
            success: function (page_details) {
                $('#site_content').html(page_details);
                window.location.hash = `#${page}`;
            },
            error: function(xhr, status, message){
                alert('Page was not found or !')
            }
        });
    }
    loadPage(page2load);

    

    // Page Navigation onclick of pagenav
    $('.pagenav').on('click', function(){
        let clickedPage = $(this).attr('id');
        $('.nav-item a').removeClass('active');
        $(this).addClass('active');
        loadPage(clickedPage);
       
    });
    // search button toggle
    $('#schtoggle').on('click', function () {
        $('#search').slideToggle('fast');
    });

});