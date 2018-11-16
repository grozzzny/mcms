(function() {

    "use strict";

    var Core = {

        initialized: false,

        initialize: function() {

            if (this.initialized) return;
            this.initialized = true;

            this.build();

        },

        build: function() {

            //methods:

        },
    };

    $(window).ready(function () {
        Core.initialize();
    });

})();