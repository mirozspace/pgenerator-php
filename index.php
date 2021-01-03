<?php
require('./passFunctions.php');

$passwordLength = 15;


if (isset($_POST['passwordLength'])) {
    $passwordLength = $_POST['passwordLength'];
}

if (isset($_POST['lowercase'])) {
    $lowercase = $_POST['lowercase'];
} else {
    $lowercase = null;
}

if (isset($_POST['uppercase'])) {
    $uppercase = $_POST['uppercase'];
} else {
    $uppercase = null;
}

if (isset($_POST['digits'])) {
    $digits = $_POST['digits'];
} else {
    $digits = null;
}

if (isset($_POST['specialSymbols'])) {
    $specialSymbols = $_POST['specialSymbols'];
} else {
    $specialSymbols = null;
}

$specialSymbolsData = str_split("-.^&*_!@%+>)");
$uppercaseData = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
$lowercaseData = str_split("abcdefghijklmnopqrstuvwxyz");
$digitsData = str_split("0123456789");

$newPassOne = createPasswordWithoutLength($passwordLength, $lowercase,
        $uppercase, $digits, $specialSymbols, $lowercaseData, $uppercaseData,
        $digitsData, $specialSymbolsData);



$finalPassword = getRandomPassword
        ($newPassOne, $passwordLength, $lowercase,
        $uppercase, $digits, $specialSymbols, $lowercaseData, $uppercaseData,
        $digitsData, $specialSymbolsData);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pass Generator v1.0</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="m0 p0">

        <div class="container-fluid content">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">P Generator v1.0</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="/">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="container">

                        <form action="" method="post" class="mt-5 form">
                            <div class="checks">
                                <div class="form-check">
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        value="checked" 
                                        id="lowercase" 
                                        name="lowercase"
                                        <?php echo (isset($_POST['lowercase'])?'checked="checked"':'') ?>
                                        >
                                    <label class="form-check-label" for="">
                                        a-z symbols
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox"
                                        value="checked" 
                                        id="uppercase"
                                        name="uppercase"
                                        <?php echo (isset($_POST['uppercase'])?'checked="checked"':'') ?>
                                        >
                                    <label class="form-check-label" for="">
                                        A-Z symbols
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        value="checked" 
                                        id="digits"
                                        name="digits"
                                        <?php echo (isset($_POST['digits'])?'checked="checked"':'') ?>
                                        >
                                    <label class="form-check-label" for="">
                                        0-9 symbols
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        value="checked" 
                                        id="specialSymbols"
                                        name="specialSymbols"
                                        <?php echo (isset($_POST['specialSymbols'])?'checked="checked"':'') ?>
                                        >
                                    <label class="form-check-label" for="">
                                        -.^&*_!@%+> symbols
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="">Input password length</label>
                                    <input 
                                        type="number" 
                                        name="passwordLength" 
                                        id="" class="form-control" 
                                        placeholder="" 
                                        aria-describedby="helpId" 
                                        value="<?php echo $passwordLength ?>"
                                        min="15"
                                        max="150">
                                    <small id="helpId" class="text-muted">Password lengtn can be beetween 15 and 150 symbols.</small>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary mt-4">Create password</button>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="container mt-6">
                        
                        <div class="password">
                            <h5>Your new password</h5>
                            <div class="newPassword">
                                <span><?php echo $finalPassword; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <footer class="footer mt-5">
                        <p>© <?php echo date('Y') ?> mirozspace</p>
                        <p><a href="https://github.com/mirozspace/pgenerator-php.git" target="_blank">GitHub</a></p>
                        <p>This site uses cookies necessary for its operation.</p>
                    </footer>
                </div>
            </div>
        </div> 

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    </body>

</html>