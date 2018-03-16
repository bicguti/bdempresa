var app = new Vue({
  el: '#app',
  data: {
    monedas: {},
    mensaje: 'HOla Vue js'
    },
    methods: {
        deleteCoin: function (key, index, e){
            e.preventDefault();
            $.ajax({
                url: '/db/destroy.php',
                type: 'GET',
                dataType: 'json',
                data: {id: key}
            })
            .done(function(json) {
                app.monedas.splice(index, 1);
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

        }
     }
})
