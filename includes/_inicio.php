<div class="col-sm-12 text-center">
<h1>Top 10 Criptomendas</h1>
</div>
<div class="col-sm-8">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Cap. de Mercado</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, index) in monedas">
                <td>{{ index+1 }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.market_cap_usd }} / <span class="fa fa-money-bill-alt fa-lg"></span> USD</td>
            </tr>

        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function(){ cargarData() }, 1500);
        // cargarData();
        function cargarData() {
            $.ajax({
                url: '/db/listar.php',
                type: 'GET',
                dataType: 'json',
                data: {limite: 10}
            })
            .done(function(json) {
                app.monedas = json;
                console.log(app.monedas);
                console.log(app.monedas[0].name);
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        }
    });
</script>
