<div class = "container-fluid">
    <form = method = "post" action = "registration">
        <div class = "col offset-4">
            <div class = "form-group col-3">
                <label>Логин</label>
                <input type = "text" name = "login" class = "form-control" required>
            </div>
            <div class = "form-group col-3"> 
                <label>Пароль</label>
                <input type = "password" name = "password" class ="form-control" required>
            </div>
            <div class = "form-group col-3"> 
                <label>Фамилия</label>
                <input type = "text" name = "first_name" class ="form-control" required>
            </div>
            <div class = "form-group col-3"> 
                <label>E-mail</label>
                <input type = "email" name = "email" class ="form-control" required>
            </div>
            <div class = "form-group col-3"> 
                <label>Телефон</label>
                <input type = "text" name = "phone" class ="form-control" required>
            </div>
            <div class = "form-group col-3"> 
                <label>Тип устройства</label>
                <select name="device" class="form-control" required>
                    <option>Смартфон</option>
                    <option>Планшет</option>
                </select>
            </div>
            <div class = "form-group col-1 align-self-end">
                <button type = "submit" class = "btn btn-primary">Зарегистрироваться</button>
            </div>
        </div>
    </form>
</div>