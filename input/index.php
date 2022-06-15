
<!doctype html>


<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Google.com</title>
        <style>
			body {
				padding-top: 50px;
				background-color: lightgray;
			}

			.starter-template {
				padding: 40px 15px;
				background-color: white;
			}
			.sss{
				size: 50%;
			}
        </style>
    </head>

	

	<body>	
		
		<div class="container">			
			<div class="jumbotron">
				<h1>
					データベーステスト登録
				</h1>
				<form method="post" action="send.php" enctype="multipart/form-data">
					<label>名前</label>
					<input type="text" name="content">
					<label>バーコード</label>
					<input type="text" name="barcode" />
					<input type="file" name="up_file">
					<div class="text-right">
					<input name="" type="submit" class="btn btn-primary btn-lg">

					</div>
				</form>
			</div>
			<p>Powerd By PPAP</p>
		</div>		
	</body>
</html>
