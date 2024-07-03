<?php $errors = json_decode($this->errorJson) ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="container shadow mt-5">
        <h1><?= $errors->type ?></h1>
        
        <h3 style="color: red;">TypeError : <span style="margin: 10px;"><?= $errors->message ?></span></h3>
        <h3>Source</h3>
        <div class="container my-2 bg-dark text-light">
            <div class="source-head">
                <p class="m-0 py-2"><?php echo $errors->file ?> (<?php echo $errors->line ?>)</p>
            </div>
            <hr class="m-0">
            <div class="source-body">
                <p>
                    <pre white-space: pre-wrap;>
                        <?php //echo $this->trace ?>
                        <?php echo $this->codeSnippet ?>
                    </pre>
                </p>
            </div>
        </div>
    </div>
</body>
</html>