<html>
	<head>
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<style>
			i.fa {
				cursor: pointer;
			}
			input[type="text"] {
				width: 170px;
				padding: 3 5px;
			}
		</style>
	</head>
	<body>
		<?php
			$db = mysqli_connect ('localhost', 'root', '', 'abit');
			mysqli_set_charset ($db, 'utf8');
			$query = mysqli_query ($db, 'SELECT * FROM `abits` ORDER BY `surname`, `name`');
			$abits = mysqli_fetch_all ($query, MYSQLI_ASSOC);
			
			echo '<table class="table">';
			echo '<tr>';
			echo '<th>Фамилия</th>';
			echo '<th>Имя</th>';
			echo '<th>Отчество</th>';
			echo '<th>Математика</th>';
			echo '<th>Русский</th>';
			echo '<th>Информатика</th>';
			echo '<th colspan="2">Операции</th>';
			echo '</tr>';
			foreach ($abits as $abit) {
				echo '<tr rel="' . $abit['id'] . '">';
				echo '<td>' . $abit['surname'] . '</td>';
				echo '<td>' . $abit['name'] . '</td>';
				echo '<td>' . $abit['patronymic'] . '</td>';
				echo '<td>' . $abit['math'] . '</td>';
				echo '<td>' . $abit['russian'] . '</td>';
				echo '<td>' . $abit['informatics'] . '</td>';
				echo '<td align="center">
					<i class="fa fa-edit edit" data-toggle="modal" data-target="#updateModal" title="Редактировать"></i>
				</td>';
				echo '<td align="center">
					<i class="fa fa-trash-o remove" data-toggle="modal" data-target="#removeModal" title="Удалить"></i>
				</td>';
				echo '</tr>';
			}
			echo '</table>';
			echo '<button class="btn btn-info add" data-toggle="modal" data-target="#addModal">Добавить абитуриента</button>';
		?>
        
        
		<!--Модальное окно начало на удаление-->
		<div class="modal fade" id="removeModal" tabindex="-1" rel="0" role="dialog" aria-labelledby="myModalLabelRemove" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabelRemove">Удаление абитуриента</h4>
			  </div>
			  <div class="modal-body">
				Вы уверены что хотите удалить выбранного абитуриента?
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
				<button type="button" class="btn btn-danger delete">Удалить</button>
			  </div>
			</div>
		  </div>
		</div>
		<!--Модальное окно конец на удаление-->
        
        
        
        <!--Модальное окно начало на изменение-->
		<div class="modal fade" id="updateModal" tabindex="-1" rel="0" role="dialog" aria-labelledby="myModalLabelUdate" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabelUdate">Изменить абитуриента</h4>
			  </div>
			  <div class="modal-body">
				<table class="table">
					<tr><th>Фамилия</th><th>Имя</th><th>Отчество</th></tr>
					<tr>
						<td><input type="text" name="surname" value="" /></td>
						<td><input type="text" name="name" value="" /></td>
						<td><input type="text" name="patronymic" value="" /></td>
					</tr>
					<tr><th>Математика</th><th>Русский</th><th>Информатика</th></tr>
					<tr>
						<td><input type="text" name="math" value="" /></td>
						<td><input type="text" name="russian" value="" /></td>
						<td><input type="text" name="informatics" value="" /></td>
					</tr>
				</table>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
				<button type="button" class="btn btn-warning update">Обновить</button>
			  </div>
			</div>
		  </div>
		</div>
		<!--Модальное окно конец на изменение-->
        
        
        
        <!--Модальное окно начало на добавление нового абитуриента-->
		<div class="modal fade" id="addModal" tabindex="-1" rel="0" role="dialog" aria-labelledby="myModalLabelAdd" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabelAdd">Добавить абитуриента</h4>
			  </div>
			  <div class="modal-body">
				<table class="table">
					<tr><th>Фамилия</th><th>Имя</th><th>Отчество</th></tr>
					<tr>
						<td><input type="text" name="surname" value="" /></td>
						<td><input type="text" name="name" value="" /></td>
						<td><input type="text" name="patronymic" value="" /></td>
					</tr>
					<tr><th>Математика</th><th>Русский</th><th>Информатика</th></tr>
					<tr>
						<td><input type="text" name="math" value="" /></td>
						<td><input type="text" name="russian" value="" /></td>
						<td><input type="text" name="informatics" value="" /></td>
					</tr>
				</table>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
				<button type="button" class="btn btn-success create">Добавить</button>
			  </div>
			</div>
		  </div>
		</div>
		<!--Модальное окно конец на добавление нового абитуриента-->
        
		<script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/notify.min.js"></script>
        <script src="abit.js"></script>
	</body>
</html>