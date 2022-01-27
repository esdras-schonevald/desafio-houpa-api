<link
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous"/>


<p>
    <h1>Consultar Pessoa</h1>
</p>


<form method="post" enctype="multipart/form-data">
    <label for="id_pessoa">Id Pessoa</label>

    <div class="input-group mb-3">
        <input type="text" id="personId" name="personId" class="form-control" placeholder="Id Pessoa" aria-label="Id Pessoa" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" onclick="this.form.action = '/person/' + personId.value + '/find'">Buscar</button>
        </div>
    </div>

</form>


<script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous">
</script>