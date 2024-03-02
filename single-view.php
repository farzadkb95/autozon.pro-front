<?= $this->include('blocks/spacer', ['loginUser' => $loginUser, 'title' => $title]) ?>


<div id="ajaxloader"></div>

<!-- 
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script> -->
<script>
    window.addEventListener("load", function() {

        $('#ajaxloader').load("account/profile/view #page", function() {
            $('.profile-acc-container').find('.acc-container').removeClass('acc-container');
            $('.profile-acc-container').find('.acc-btn').addClass('acc-static-btn').removeClass('acc-btn');
            $('.profile-acc-container').find('.acc-text').show();
            $('.profile-acc-container').find('[data-src],.acc-icon,[data-action-url]').hide();

            /* 
                        var elem = document.querySelector('.profile-acc-container');
                        var msnry = new Masonry(elem, {
                            // options
                            itemSelector: '.grid-item',
                            // use element for option
                            columnWidth: '.grid-sizer',
                            percentPosition: true

                        });
             */

        });
    })
</script>