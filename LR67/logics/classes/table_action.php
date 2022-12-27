<?php

class TableAction
{
	public static function Add()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
			if ($_POST['img_path'] != '' && $_POST['adress'] != '' && $_POST['description'] != '' && $_POST['storeid'] != 0) {
				Table::Add($_POST['img_path'], htmlspecialchars($_POST['adress']),
					htmlspecialchars($_POST['description']), $_POST['storeid']);

				return 0;
			} else {
				return 1;
			}
		}

		return 2;
	}

	public static function Edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
			if ($_POST['customid'] != 0 && $_POST['img_path'] != '' && $_POST['adress'] != '' && $_POST['description'] != '' && $_POST['storeid'] != 0) {
				Table::Edit($_POST['customid'], $_POST['img_path'], htmlspecialchars($_POST['adress']),
					htmlspecialchars($_POST['description']), $_POST['storeid']);

				return 0;
			} else {
				return 1;
			}
		}

		return 2;
	}

	public static function Delete()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
			Table::Delete($_POST['customid']);

			return 0;
		} else {
			return 1;
		}
	}
}