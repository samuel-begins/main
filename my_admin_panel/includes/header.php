<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">



<table>
    <tr><th>Имя</th><th>Возраст</th></tr>
    <tr><td>Иван</td><td>25</td></tr>
</table>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Имя</th>
            <th>Возраст</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Иван</td>
            <td>25</td>
        </tr>
        <tr>
            <td>Мария</td>
            <td>30</td>
        </tr>
    </tbody>
</table>


<form method="post">
    <input type="text" name="name">
    <input type="submit" value="Отправить">
</form>

<form method="post" class="mt-3">
    <div class="mb-3">
        <label for="name" class="form-label">Имя</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
