;
(function ($) {
    $.fn.loading = function () {
        var DEFAULTS = {
            percent: 75,
            duration: 2000
        };

        $(this).each(function () {
            var $target = $(this);

            var opts = {
                percent: $target.data('percent') ? $target.data('percent') : DEFAULTS.percent,
                duration: $target.data('duration') ? $target.data('duration') : DEFAULTS.duration
            };

            $target.append('<div class="progress"></div>');

            var $progress = $target.find('.progress');
            
            setTimeout(function () {
                $progress.css({
                    'transition': 'width ' + opts.duration + 'ms linear',
                    'width': '100%'

                });
            }, 1);
        });
    }
})(jQuery);