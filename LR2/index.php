<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR2/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR2/logics/table_logic.php');
?>

<div class="container">
	<form class="my-3" name="form" method="get" >
		<div class="mb-3">
			<label class="form-label">Фильтрация по адресу покупателя:</label>
			<input type="text" class="form-control" style="width: 500px;" name="adress" placeholder="Введите адрес покупателя"
				   value="<?php echo $adress?>">
		</div>

		<div class="mb-3">
			<label class="form-label">Фильтрация по описанию:</label>
			<input type="text" class="form-control" style="width: 500px;" name="description" placeholder="Введите описание"
				   value="<?php echo $description?>">
		</div>

		<div class="mb-3">
			<label class="form-label">Фильтрация по точке продаж:</label>
			<select class="form-select" name="storeid" style="width: 500px;">
				<option value = 0>Выберите номер точки</option>  <!-- Заполнение выпадающего списка из запроса по клиентам -->
				<?php foreach($store_list as $store) {?>
					<option value='<?php echo $store['storeid']?>' <?php if ($store['storeid'] == $storeid) {echo 'selected';} ?>>
						<?php echo $store['storeid']?></option>
				<?php }?>
			</select>
		</div>

		<div class="mb-3">
			<label class="form-label">Фильтрация по верхней цене:</label>
			<?php //if($err > 100){ echo "<p class='text-danger'>Ошибка, переменная не число<br></p>";} ?>
			<input type="text" class="form-control " style="width: 500px;" name="price_top" placeholder="Введите верхнюю цену услуги"
				   value="<?php echo $price_top?>">
		</div>

        <?php //if ($err > 100) echo '<p class="text-danger">Введите числовые значения в поля для цены</p>'; ?>

		<div class="mb-3">
			<label class="form-label">Фильтрация по нижней цене:</label>
			<?php //if($err > 100){ echo "<p class='text-danger'>Ошибка, переменная не число<br></p>";} ?>
			<input type="text" class="form-control" style="width: 500px;" name="price_bottom" placeholder="Введите нижнюю цену услуги"
				   value="<?php echo $price_bottom?>">
		</div>

		<input type="submit" class="btn btn-success" onclick="" value="Отфильтровать" name="get_me">
		<input type="submit" class="btn btn-danger" onclick="" value="Очистить" name="clear">
	</form>
</div>

<div class="container">
	<table class="table my-5">
		<thead>
		<tr>
			<th scope="col">Скан чека</th>
			<th scope="col">Адрес покупателя</th>
			<th scope="col">Описание</th>
			<th scope="col">Номер торговой точки</th>
			<th scope="col">Цена услуги</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($tableData as $post): ?>
			<tr class='tr-class'>
				<td><img width='150' class='img-fluid post-image' src='img/<?=$post['img_path']?>'></td>
				<td><?=$post['adress']?></td>
				<td><?=$post['description']?></td>
				<td><?=$post['storeid']?></td>
				<td><?=$post['price']?>₽</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR2/footer.php');
?>
