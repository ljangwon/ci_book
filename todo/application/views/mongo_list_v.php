	<article id="board_area">
		<header>
			<h1>MongoDB 목록</h1>
		</header>
		<table cellspacing="0" cellpadding="0" class="table table-striped">
			<thead>
				<tr>
					<th scope="col" width="100">번호</th>
					<th scope="col" width="100">이름</th>
				</tr>
			</thead>
			<tbody>
		<?php
		foreach ($list as $lt)
		{
		?>
			<tr>
				<th scope="row">
					<?php echo $lt['_id'];?>
				</th>
				<td><?php echo $lt['name'];?></td>
			</tr>
		<?php
		}
		?>
		</tbody>
	</table>

	<form action="/todo/test/insert" method="post">
		<input type="text" name="name">	<input type="submit" value="이름입력">
	</form>
	</article>