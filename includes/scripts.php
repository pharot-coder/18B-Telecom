<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src=" assets/js/jquery-3.4.1.min.js "></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src=" assets/js/popper.min.js  "></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src=" assets/js/bootstrap.min.js "></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src=" assets/js/mdb.min.js"></script>
<!--Font Awesome-->
<script src="https://kit.fontawesome.com/972fca3ac9.js" crossorigin="anonymous"></script>
<!-- Carousel -->
<script type="text/javascript" src="assets/OwlCarousel/dist/owl.carousel.min.js"></script>
<!-- Magify -->
<script src="assets/magnify/js/jquery.magnify.js"></script>
<!-- Light Box-->
<script type="text/javascript" src="assets/lightbox2/dist/js/lightbox.min.js"></script>

<!-- DataTables JS -->
<script src="assets/js/addons/datatables.min.js" type="text/javascript"></script>

<!-- DataTables Select JS -->
<script src="assets/js/addons/datatables-select.min.js" type="text/javascript"></script>

<script async defer crossorigin="anonymous"
src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=508566810522503&autoLogAppEvents=1"
nonce="eBuu3m3k"></script>

<script>
    lightbox.option({
      'resizeDuration': 400,
      'wrapAround': true
  })
</script>
<script type="text/javascript">

 $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,
    autoplayTimeout: 1000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
});
 $('.owl-carousel').on('mousewheel', '.owl-stage', function(e) {
    if (e.deltaY > 0) {
        owl.trigger('next.owl');
    } else {
        owl.trigger('prev.owl');
    }
    e.preventDefault();
});

 $(document).ready(function() {
   getCart();
   $('.zoom').magnify();
   $('li').click(function() {
      $(this).addClass('active').siblings().removeClass('active');
  });
});

</script>

<script type="text/javascript">

    $(document).ready(function(){

        $('.dataTables_length').addClass('bs-select');
        $('#dtBasicExample').DataTable();
        $('#sumordertable').DataTable();
        $('#orderdetailtable').DataTable();
        $('#ordertable').DataTable();
        $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");

        $('#searchinput').focusin(function(e){
            e.preventDefault();
            $('#searchinput').css({
                width: '400px',
                
            });
        });

        $('#searchinput').focusout(function(e){
            e.preventDefault(); 
            $('#searchinput').css({
                width: '1%',
            });
        });

        $('#logout').on('click', function(e) {
            e.preventDefault();
            $('#logoutmodal').modal('show');
        });
        
        $(".scroll-to-top").click(function() {
            $("html, body").animate({ scrollTop: 0 }, 1200);
        });

        $(window).scroll(() => {
            var scrollTop = $(window).scrollTop();
            if(scrollTop > 1){
                $('.scroll-to-top').show();
            }else{
                $('.scroll-to-top').hide();
            }
        });

        $('.close').click(function() {
         $('#alert').hide();
     });

        $(document).on('click','#sidebarshowBtn',() =>{
            $('.sidebar').css({
                "width":"300px"
            });
            $('#sidebarshowBtn').hide();
        });
        $(document).on('click','#sidebarhideBtn',() =>{
            $('.sidebar').css({
                "width":"0"
            });
            $('#sidebarshowBtn').show();
        });

        $(document).on('click','#btnlist',function(){
            var product_grid = $('.product-grid');
            var product_list = $('.product-list-view');
            for(i = 0; i <= product_grid.length; i++){
             product_grid.each(function(){
                $(this).hide();
            });
         }
         for(i = 0; i<=product_list.length; i++){
            product_list.each(function(){
                $(this).show();
            });
        }
    });

        $(document).on('click','#btngrid',function(){
            var product_grid = $('.product-grid');
            var product_list = $('.product-list-view');
            for(i = 0; i <= product_grid.length; i++){
             product_grid.each(function(){
                $(this).show();
            });
         }
         for(i = 0; i<=product_list.length; i++){
            product_list.each(function(){
                $(this).hide();
            });
        }
    });

    });


    function getCart() {
        $.ajax({
            type: 'POST',
            url: 'cart_count.php',
            dataType: 'json',
            success: function(response) {
                $('.cart_count').html(response.count);
            }
        });
    }


    



</script>