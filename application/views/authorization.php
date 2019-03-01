<div class = "container-fluid">
    <?=form_open('home')?>
        <div class = "col offset-4">
            <div class = "form-group col-3">
                <label>Логин</label>
                <input type = "text" name = "login" class = "form-control" required>
            </div>
            <div class = "form-group col-3"> 
                <label>Пароль</label>
                <input type = "password" name = "password" class ="form-control" required>
            </div>
            <div class = "form-group col-1 align-self-end">
                <button type = "submit" class = "btn btn-primary">Войти</button>
            </div>
        </div>
</div>