notification = {

    success: function(from, align, message) {
        color = 'success';

        $.notify({
                icon: "nc-icon nc-bulb-63",
                message: message
            }, {
                type: color,
                timer: 8000,
                placement: {
                    from: from,
                    align: align
            }
        });
    },
    
    info: function(from, align, message) {
        color = 'primary';

        $.notify({
                icon: "nc-icon nc-bell-55",
                message: message
            }, {
                type: color,
                timer: 8000,
                placement: {
                    from: from,
                    align: align
            }
        });
    },

    warning: function(from, align, message) {
        color = 'warning';

        $.notify({
                icon: "nc-icon nc-bell-55",
                message: message
            }, {
                type: color,
                timer: 8000,
                placement: {
                    from: from,
                    align: align
            }
        });
    },

    danger: function(from, align, message) {
        color = 'danger';

        $.notify({
                icon: "nc-icon nc-bulb-63",
                message: message
            }, {
                type: color,
                timer: 8000,
                placement: {
                    from: from,
                    align: align
            }
        });
    }
}