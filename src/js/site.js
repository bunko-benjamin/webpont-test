var Site = {
    items: [],
    cookie: 'DiamondGridSate',
    Setup: function () {
        Site.CheckPrevSession();
    },
    CheckPrevSession: function () {
        var cookie = Cookies.get(Site.cookie);
        if (cookie){
            var items = JSON.parse(cookie);
            Site.UpdateItems(items, 10 + items.length);
        }
        $('#submit').on('click', function (e) {
            e.preventDefault();
            Site.LoadMore($(this));
        });
    },
    SetSession: function (from) {
        Cookies.set(Site.cookie, from);
    },
    LoadMore: function (el) {
        var from = el.data('from');
        var limit = el.data('limit');
        $.getJSON('/get-data/' + (from + 1) + '/' + limit, function(data) {
            Site.UpdateItems(data, from + limit);
        });
    },
    UpdateItems: function (data, val) {
        var items = [];
        var temp = [];
        $.each(data, function(k, i) {
            items.push(Site.GetItem(i));
            temp.push(i);
        });
        $('.grid').append(items);
        Site.items = Site.items.concat(temp);
        Site.UpdateLink(val);
        Site.SetSession(Site.items);
    },
    UpdateLink: function (from) {
        var limit;
        if ($.inArray(from, states) != -1) {
            limit = steps[0];
        } else {
            limit = steps[1];
        }

        $('#submit').data('from', from).data('limit', limit);

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