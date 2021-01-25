(function() {
    window.scroll_hidden = function(comp) {
        if ( !window.overlay || (window.overlay && comp == window.overlay) ) {
            var coef = document.documentElement.scrollHeight - window.innerHeight;

            if ( document.body.classList.contains('_scroll_hidden') ) {
                document.body.classList.remove('_scroll_hidden');
                document.body.style.marginRight = '0px';

                window.overlay = false;
            }else{
                if ( coef > 0 ) {
                    var offset = window.innerWidth - document.body.clientWidth;

                    document.body.style.marginRight = offset +'px';
                }
                document.body.classList.add('_scroll_hidden');
                window.overlay = comp;
            }
        }
    }
})();
