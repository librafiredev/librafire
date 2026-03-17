<?php
session_start();
$AUTHORIZED_PASSWORD = 'lf4231';

if (!isset($_SESSION['authorized'])) {
    if (isset($_POST['password']) && $_POST['password'] === $AUTHORIZED_PASSWORD) {
        $_SESSION['authorized'] = true;
    } else {
        echo '<form method="POST"><label>Password: <input type="password" name="password"></label><input type="submit" value="Submit"></form>';
        exit;
    }
}

if (isset($_GET)) {
    extract($_GET);
}
$address = !empty($address) ? $address : 'Tihomira Ostojića 10, Novi Sad, Serbia';
$fb = !empty($fb) ? $fb : 'https://www.facebook.com/librafireagency/';
$in = !empty($in) ? $in : 'https://www.instagram.com/librafireagency/';
$ln = !empty($ln) ? $ln : 'https://www.linkedin.com/company/librafire/';

error_reporting(-1);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signature generator</title>
    <style>
        .wrapper {
            width: 100%;
            float: left;
        }

        .wrapper .form-wrapper {
            width: 30%;
            float: left;
        }

        .wrapper form input {
            width: 70%;
            float: right;
        }

        .wrapper .mail-wrapper {
            float: left;
            width: 60%;
            padding-left: 50px;
        }
    </style>
</head>

<body>

</body>

</html>
<div class="wrapper" id="wrapper">

    <div class="form-wrapper">
        <h3>Koraci: </h3>
        <ol>
            <li>Popuniti sva polja u formi ispod.</li>
            <li>Kliknuti na "Generate signature".</li>
            <li>Proveriti validnost informacija na samom signature-u.</li>
            <li>Kliknuti na "Copy signature" da bi se isti kopirao u clipboard.</li>
            <li>Ukoliko koristite gmail web clijent pratite sledece korake:
                <ul>

                    <li>idi na <a target="_blank" href="https://mail.google.com">https://mail.google.com</a></li>
                    <li>Click na tockic</li>
                    <li>Settings</li>
                    <li>General</li>
                    <li>Scroll dole do polja za "Signature"</li>
                    <li>Klik na text polje i paste (ctrl + v / desni click => paste)</li>
                    <li>Save changes</li>
                </ul>
            </li>
        </ol>

        <form action="#">
            <fieldset>
                <p>
                    <label for="firstname">
                        Ime:
                        <input value="<?php echo $firstname; ?>" type="text" id="firstname" name="firstname">
                    </label>
                </p>
                <p>
                    <label for="lastname">
                        Prezime:
                        <input value="<?php echo $lastname; ?>" type="text" id="lastname" name="lastname">
                    </label>
                </p>
                <p>
                    <label for="role">
                        Pozicija:
                        <input value="<?php echo $role; ?>" type="text" id="role" name="role">
                    </label>
                </p>
                <p>
                    <label for="email">
                        Email:
                        <input value="<?php echo $email; ?>" type="email" id="email" name="email">
                    </label>
                </p>
                <p>
                    <label for="telephone">
                        Telefon:
                        <input value="<?php echo $telephone; ?>" type="text" id="telephone" name="telephone">
                    </label>
                </p>
                <p>
                    <label for="address">
                        Adresa:
                        <input value="<?php echo $address; ?>" type="text" id="address" name="address">
                    </label>
                </p>
                <p>
                    <label for="fb">
                        Facebook:
                        <input value="<?php echo $fb; ?>" type="text" id="fb" name="fb">
                    </label>
                </p>
                <p>
                    <label for="in">
                        Instagram:
                        <input value="<?php echo $in; ?>" type="text" id="in" name="in">
                    </label>
                </p>
                <p>
                    <label for="ln">
                        Linkedin:
                        <input value="<?php echo $ln; ?>" type="text" id="ln" name="ln">
                    </label>
                </p>
                <button type="submit">Generate signature</button>
            </fieldset>
        </form>

    </div>

    <div class="mail-wrapper" id="mail-wrapper">
        <div class="mail" id="mail">
            <?php

            if (!empty($_GET)) {

            ?>

                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <title>LibraFire Signature</title>
                    <!--[if mso]>
                    <style> body, table tr, table td, a, span, table.MsoNormalTable {
                        font-family: Arial, Helvetica, sans-serif !important;
                    }</style>
                    <!--<![endif]-->
                </head>

                <body>
                    <!--[if mso]>
                <center>
                    <table>
                        <tr>
                            <td width="600">
                <![endif]-->
                    <div style="max-width: 600px;">

                        <table style="font-family: Arial, sans-serif;" width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                            <tr>
                                <td align="left" width="600" bgcolor="white">
                                    <table width="100%" style="background-color: #F05524;" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="left" style="font-size: 0;">
                                                <img align="left" src="https://www.librafire.com/images/upper-left-corner.jpg" style="vertical-align: bottom;" alt="Upper left corner">
                                            </td>
                                            <td colspan="2" style="background-color: #ffffff; font-size: 0;">
                                                <img align="left" src="https://www.librafire.com/images/upper-top-center.jpg" style="vertical-align: bottom;" alt="Upper top content">
                                            </td>
                                        </tr>

                                        <!-- Central part of email -->
                                        <tr>
                                            <td width="45" bgcolor="ED6825">

                                            </td>
                                            <td bgcolor="252F37" style="color: white;">

                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td height="28"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" width="100" style="border-right: 1px solid #D6D6D6;">
                                                            <img src="https://www.librafire.com/images/logo.png" alt="LibraFire logo">
                                                        </td>
                                                        <td width="14">&nbsp;</td>
                                                        <td>
                                                            <table class="main-table" width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td colspan="3" style="font-family: Arial, sans-serif; font-size: 18px; font-weight: bold; color: #F05524;">
                                                                        <?php echo $firstname; ?>&nbsp;<?php echo $lastname; ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- Separator -->
                                                                <tr>
                                                                    <td colspan="3" style="height: 2px; font-size: 0px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" style="font-family: Arial, sans-serif; font-size: 14px; font-weight: bold; color: #EEEEEE;">
                                                                        <?php echo $role; ?>
                                                                    </td>
                                                                </tr>
                                                                <!-- Separator -->
                                                                <tr>
                                                                    <td colspan="3" style="height: 8px; font-size: 0px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr class="chunk" style="font-size: 12px;">
                                                                    <td colspan="3" style="width: 100%;">
                                                                        <?php if ($email) : ?>
                                                                            <a href="mailto:<?php echo $email; ?>" style="display: inline-block; line-height: 1.7; text-decoration: none; color: #EEEEEE">
                                                                                <img src="https://www.librafire.com/images/icon-email.png" alt="email icon"><strong style="margin-left: 5px; font-weight: normal; font-family: Arial, sans-serif; text-decoration: none;"><?php echo $email; ?></strong>
                                                                            </a>
                                                                        <?php endif; ?>
                                                                        <span style="color: #EEEEEE">&nbsp;|&nbsp; </span>
                                                                        <a href="https://www.librafire.com" style="display: inline-block; line-height: 1.7; text-decoration: none; color: #EEEEEE">
                                                                            <img src="https://www.librafire.com/images/icon-site.png" alt="web icon"><strong style="margin-left: 5px; font-weight: normal; font-family: Arial, sans-serif; text-decoration: none;">www.librafire.com</strong>
                                                                        </a>
                                                                        <?php if ($telephone) : ?>
                                                                            <span style="color: #EEEEEE">&nbsp;|&nbsp; </span>
                                                                            <a href="tel:<?php echo $telephone; ?>" style="display: inline-block; line-height: 1.7; text-decoration: none; color: #EEEEEE">
                                                                                <img src="https://www.librafire.com/images/icon-phone.png" alt="phone icon"><strong style="margin-left: 5px; font-weight: normal; font-family: Arial, sans-serif; text-decoration: none;"><?php echo $telephone; ?></strong>
                                                                            </a>
                                                                        <?php endif; ?>
                                                                    </td>

                                                                    <!--<td style="padding: 0 4px; text-align: center; border-left: 1px solid #EEEEEE; border-right: 1px solid #EEEEEE;">-->
                                                                    <!---->
                                                                    <!--</td>-->

                                                                    <!--<td style="text-align: left; padding-left: 7px;">-->
                                                                    <!---->
                                                                    <!--</td>-->
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3" style="height: 8px; font-size: 0px">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr style="font-size: 12px; line-height: 2;">
                                                                    <td colspan="2">
                                                                        <a href="https://maps.google.com/?q=<?php echo $address; ?>" style="text-decoration: none; color: #EEEEEE">
                                                                            <img src="https://www.librafire.com/images/icon-marker.png" alt="email icon"> <span style="font-family: Arial, sans-serif; text-decoration: none;"><?php echo $address; ?></span>
                                                                        </a>
                                                                    </td>

                                                                    <td style="padding: 0 3px; ">
                                                                        <?php if ($fb != '') : ?>
                                                                            <a href="<?php echo $fb; ?>" style="text-decoration: none; color: #EEEEEE"><img src="https://www.librafire.com/images/icon-facebook.png" style="height: 14px; vertical-align: middle;" alt="facebook icon"></a>
                                                                            <span width="10">&nbsp;</span>
                                                                        <?php endif; ?>


                                                                        <?php if ($in != '') : ?>
                                                                            <a href="<?php echo $in; ?>" style="text-decoration: none; color: #EEEEEE;"><img src="https://www.librafire.com/images/icon-instagram.png" style="height: 14px;vertical-align: middle;" alt="facebook icon"></a>
                                                                            <span width="10">&nbsp;</span>
                                                                        <?php endif; ?>

                                                                        <?php if ($ln != '') : ?>
                                                                            <a href="<?php echo $ln; ?>" style="text-decoration: none; color: #EEEEEE;"><img src="https://www.librafire.com/images/icon-linkedin.png" style="height: 14px;vertical-align: middle;" alt="linkedin icon"></a>

                                                                            <span width="10">&nbsp;</span>
                                                                        <?php endif; ?>

                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="28"></td>
                                                    </tr>
                                                </table>

                                            </td>
                                            <td width="45" bgcolor="252F37">

                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="font-size: 0;">
                                                <img align="left" src="https://www.librafire.com/images/upper-left-corner.jpg" style="vertical-align: top;" alt="Upper left corner">
                                            </td>
                                            <td colspan="2" style="background-color: #ffffff; font-size: 0;">
                                                <img align="left" src="https://www.librafire.com/images/upper-top-center.jpg" style="vertical-align: top;" alt="Upper top content">
                                            </td>
                                        </tr>


                                    </table>
                                </td>
                                <td style="font-size:0px">&nbsp;
                                </td>
                            </tr>
                        </table>

                    </div>
                    <!--[if mso]>
                </td></tr></table>
                </center>
                <![endif]-->

                </body>

                </html>


            <?php

            }

            ?>
        </div>
        <br />
        <br />
        <?php
        if (!empty($_GET)) {
        ?>
            <button onclick="CopyToClipboard('mail')">Copy signature</button>

        <?php
        }

        ?>

    </div>
</div>

<script>
    function CopyToClipboard(containerid) {
        if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select().createTextRange();
            document.execCommand("copy");

        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
            document.execCommand("copy");
            document.getElementById('mail-wrapper').innerHTML += "<p>Email signature copied to clipboard</p>";

        }
    }
</script>