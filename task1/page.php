<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta name="author" content="Akimov Michael">

    <title>Графический редактор</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Графический редактор</h1>
        <form method="POST">
            <textarea name="shapes" rows="10" class="form-control"><?=isset($_POST["shapes"])?$_POST["shapes"]:""?></textarea><br >
            <input type="submit" value="Нарисовать" class="btn btn-lg btn-primary">
        </form>
        
        <?php if(isset($oRender)): ?>
        <?php $oRender->show(); ?>
        <?php endif; ?>
        <h2>Пример данных</h2>
        <pre>
[
{"type": "Circle","params":{"x":100, "y":100, "r":50,"border":30,"color":"rgb(10,10,100)", "bgColor":"rgb(200,100,30)"}},
{"type":"Square","params":{"x":200, "y":200, "w":50,"h":50,"border":10,"color":"rgb(10,100,10)", "bgColor":"rgb(200,10,30)"}}
]
        </pre>
    </div>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>