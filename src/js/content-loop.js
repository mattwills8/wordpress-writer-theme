(function($) {
    
    $(document).ready(function(){
        
        $('article.post').hover(function() {
            $(this).toggleClass('article-hover');
        })
        
    });
    
})(jQuery);