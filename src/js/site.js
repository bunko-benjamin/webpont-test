var Site = {
    Setup: function () {
        $('#submit').on('click', function (e) {
            e.preventDefault();
            Site.LoadMore($(this));
        });
    },
    LoadMore: function (el) {
        var from = el.data('from');
        var limit = el.data('limit');
        $.getJSON('/get-data/' + (from + 1) + '/' + limit, function(data) {
            var items = [];
            $.each(data, function(key, val) {
                items.push(Site.GetItem(val));
            });
            $('.grid').append(items);
            Site.UpdateLink(from + limit)
        });
    },
    UpdateLink: function (from) {
        var limit;
        if ($.inArray(from, states) != -1) {
            limit = steps[0];
        } else {
            limit = steps[1];
        }

        $('#submit').data('from', from);
        $('#submit').data('limit', limit);

        if (from >= 100) {
            Site.HideSubmit(true);
        }
    },
    GetItem: function (num) {
        return '<div class="grid-item"><div class="grid-inner">' + num + '</div></div>';
    },
    HideSubmit: function (set) {
        $('#submit').toggleClass('hidden', set);
    }
};

$(window).on('load', function(){
    Site.Setup();
});
