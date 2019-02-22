<div class = "container-fluid">
        <form method = "post" action = "group_product">
            <div class = "form-row">
                <div class = "form-group col-4">
                    <label>Наименование группы товара</label>
                    <input type = "text" name = "name_group" class = "form-control">
                </div>
            </div>
            <table class="table">
                <thead class = "thead-dark">
                    <tr>
                        <th col = "">№</th>
                        <th col = "">Наименование группы товара</th>
                    </tr>
                </thead>
                <tbody>
    <?php
            foreach ($group_product as $item){
                echo '<tr>';
                echo '		<td>'.$item['id_group'].'</td>';
                echo '		<td>'.$item['name_group'].'</td>';
                echo '	</tr>';
            }			
    ?>
                </tbody>
            </table>
        </form>
    </div>