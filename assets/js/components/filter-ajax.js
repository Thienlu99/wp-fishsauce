jQuery(document).ready(function () {
    $('.filter-btn').click(function() {
        const post_type = JSON.parse($(this).attr('post-type'));
        const after = $('#start-date').val();
        const before = $('#end-date').val();
        const base = $('input[name="base"]').val();
        const key_word = $('input[name="key_word"]').val(); 
        const cats = $('.cat-checkbox').map((i,el)=> {
            if($(el).is(':checked')) return $(el).val();
        }).get()
        $.ajax({
            type: 'post',
            cache: false,
            context: this,
            async: true,
            url: '/wp-admin/admin-ajax.php',
            dataType: 'html',
            data: {
                action: 'filter_action',
                post_type: post_type,
                cat: cats,
                after: after,
                before: before,
                base: base,
                key_word: key_word
            },
            beforeSend: function () {
                $('.loading-overlay').show().css('display','flex')
            },
            success: function(response) {
                $('.list-new-js').html(response);
                lazyLoadInstance.update();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.warn(textStatus, errorThrown);
                // $('.list-new-js').html(response);
            },
            complete: function() {
                $('.loading-overlay').hide();
            }
        });
    }) 
    
})