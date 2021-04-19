var Site = {
    Setup: function () {
        $('#submit').on('click', function (e) {
            e.preventDefault();
            Site.LoadMore();
        });
    },
    LoadMore: function () {
        console.log('load');
    }
};

$(window).on('load', function(){
    Site.Setup();
});
