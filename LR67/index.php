<?php
$title = "Рострубосталь";
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR67/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR67/logics/classes/database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR67/logics/classes/table.php');
?>

<div class="container">
	<table class="table my-5">
		<thead>
		<tr>
			<th scope="col">Номер записи</th>
			<th scope="col">Скан чека</th>
			<th scope="col">Адрес покупателя</th>
			<th scope="col">Описание</th>
			<th scope="col">Номер торговой точки</th>
			<th scope="col">Цена услуги</th>
			<th scope="col"></th>
			<th scope="col"></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach (Table::Show() as $item): ?>
			<tr class='tr-class'>
				<td><?=$item['customid']?></td>
				<td><img width='150' class='img-fluid post-image' src='img/<?=$item['img_path']?>'></td>
				<td><?=$item['adress']?></td>
				<td><?=$item['description']?></td>
				<td><?=$item['storeid']?></td>
				<td><?=$item['price']?>₽</td>
				<td><a href="/lena/LR67/edit/?id=<?=$item['customid']?>" class="btn btn-success">Редактировать</a></td>
				<td><a href="/lena/LR67/delete/?id=<?=$item['customid']?>" class="btn btn-danger">Удалить</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<a href="/lena/LR67/add/" class="btn btn-primary" style="width: 300px;">Добавить запись</a>
</div>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lena/LR67/footer.php');
?>
