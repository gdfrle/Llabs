<?php
error_reporting(0);
class Table
{
	public static function Show()
	{
		$query = Database::prepare('SELECT `customid`, `img_path`, `adress`, `description`, `storeid`, `price` 
									FROM `customer` INNER JOIN `store` ON (`fk_storeid` = `storeid`) ORDER BY `customid`');
		if (!$query->execute()) {
			throw new PDOException("При выводе записей возникла ошибка");
		} else {
			$items = $query->fetchAll();

			return $items;
		}
	}

	public static function GetById(int $id)
	{
		$query = Database::prepare('SELECT `img_path`, `adress`, `description`, `storeid`, `price` 
				FROM `customer` INNER JOIN `store` ON (`fk_storeid` = `storeid`) WHERE `customid` = :id');
		$query->bindValue(':id', $id);

		if (!$query->execute()) {
			throw new PDOException("При показе записи возникла ошибка");
		} else {
			$item = $query->fetchAll();

			return $item[0];
		}
	}

	public static function Add(string $img, string $adress, string $description, int $storeid)
	{

		$query = Database::prepare('INSERT INTO `customer` (`img_path`, `adress`, `description`, `fk_storeid`)
											VALUES (:img, :adress, :desc, :storeid)');
		$query->bindValue(':img', $img);
		$query->bindValue(':adress', $adress);
		$query->bindValue(':desc', $description);
		$query->bindValue(':storeid', $storeid);

		if (!$query->execute()) {
			throw new PDOException("При добавлении записи возникла ошибка");
		}
	}

	public static function Edit(int $id, string $img, string $adress, string $description, int $storeid)
	{
		$query = Database::prepare('UPDATE `customer` SET `img_path` = :img, `adress` = :adress, `description` = :desc,
    								`fk_storeid` = :storeid WHERE `customid` = :id');
		$query->bindValue(':id', $id);
		$query->bindValue(':img', $img);
		$query->bindValue(':adress', $adress);
		$query->bindValue(':desc', $description);
		$query->bindValue(':storeid', $storeid);

		if (!$query->execute()) {
			throw new PDOException("При обновлении записи возникла ошибка");
		}
	}

	public static function Delete(int $id)
	{
		$query = Database::prepare('DELETE FROM `customer` WHERE `customid` = :id');
		$query->bindValue(':id', $id);

		if (!$query->execute()) {
			throw new PDOException("При удалении записи возникла ошибка");
		}
	}
}