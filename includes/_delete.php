<div class="col-sm-12 text-center">
<h1>Eliminar Criptomendas</h1>
</div>
<div class="col-sm-8">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Cap. de Mercado</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <tr v-if="monedas.length === 0">
                <td colspan="4">
                    <span class="fas fa-spinner fa-pulse fa-2x"></span>
                </td>
            </tr>
            <tr v-for="(item, index) in monedas">
                <td>{{ index+1 }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.market_cap_usd }} / <span class="fa fa-money-bill-alt fa-lg"></span> USD</td>
                <td class="text-center">
                    <a href="#" v-on:click="deleteCoin(item._id, index, $event)" class="text-danger">
                        <span class="fa fa-trash-alt fa-lg"></span>
                    </a>
                </td>
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
                url: '/db/listardelete.php',
                type: 'GET',
                dataType: 'json',
                // data: {limite: 10}
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
