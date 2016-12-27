@extends('auth.login')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.growl.js" type="text/javascript"></script>
<link href="css/jquery.growl.css" rel="stylesheet" type="text/css" />

<script>
    $(document).ready(function () {
        $.growl.error({
            message:"Only power2sme employees can login"
        });

    })


</script>