<div class="container-fluid">
        <div class="jumbotron mt-5">
            <h1 class="display-4">Error Handler</h1>
            <p class="lead">A PHP error occurred:</p>
            <p class="alert alert-danger">Severity: <?php echo $severity; ?></p>
            <p class="alert alert-danger">Message: <?php echo $message; ?></p>
            <p class="alert alert-danger">File: <?php echo $file; ?></p>
            <p class="alert alert-danger">Line: <?php echo $line; ?></p>
        </div>
    </div>