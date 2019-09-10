var home = {
    subtitle: $("#homeSubTitle"),

    initHome: function () {
        var tps = 1000;

        $(".homeBlock").each(function() {
            var $this = $(this);
            
            setTimeout(function() {
                $this.animate({'opacity':'1'}, 1500);
             }, tps);

            tps += 2000;
        });
    },

    doTheSubT: function() {
        setTimeout(function() {
            setInterval(function() {
                setTimeout(function() {
                    home.subtitle.animate({'opacity':'0'}, 1000);
                }, 0);
                setTimeout(function() {
                    home.subtitle.animate({'opacity':'1'}, 1000);
                }, 1000);
            }, 4000)
        }, 2000);
    },
};

this.home.initHome();
this.home.doTheSubT();