<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <script>
            function submit() {
                alert("The form was submitted");
            }


            function validate() {
                if (document.myForm.user.value.length < 6) {
                    alert("Please enter a username that is at least 6 characters long");
                    document.myForm.user.focus();
                    return false;
                }

                if (document.myForm.pass.value.length < 6) {
                    alert("Please enter a password that is at least 6 characters long.");
                    document.myForm.pass.focus();
                    return false;
                }

                if (document.myForm.pass.value != document.myForm.pass1.value) {
                    alert("Your passwords do not match! Please re-enter your password!");
                    document.myForm.pass1.focus();
                    return false;
                }

                if (document.myForm.first.value == "") {
                    alert("Please provide your First name!");
                    document.myForm.first.focus();
                    return false;
                }

                if (document.myForm.last.value == "") {
                    alert("Please provide your Last name!");
                    document.myForm.last.focus();
                    return false;
                }

                if (document.myForm.address.value == "") {
                    alert("Please provide your Address!");
                    document.myForm.address.focus();
                    return false;
                }

                if (document.myForm.city.value == "") {
                    alert("Please provide your City!");
                    document.myForm.city.focus();
                    return false;
                }

                if (document.myForm.state.value == "") {
                    alert("Please provide your State!");
                    document.myForm.state.focus();
                    return false;
                }

                if (document.myForm.zip.value == "" ||
                    document.myForm.zip.value.length != 5) {
                    alert("Please provide a Zip code in the format #####.");
                    document.myForm.zip.focus();
                    return false;
                }
                var zip = /^[0-9a]+$/;
                if (!document.myForm.zip.value.match(zip)) {
                    alert("Please only enter numeric characters for the Zip code");
                    document.myForm.zip.focus();
                    return false;
                }

                if (document.myForm.creditcard[0].checked = true) {
                    return true;
                } else if (document.myForm.creditcard[1].checked == true) {
                    return true;
                } else if (document.myform.creditcard[2].checked == true) {
                    return true;
                } else {
                    alert("Please choose your credit card type!");
                    return false;
                }

                if (document.myForm.creditno.value == "" ||
                    document.myForm.creditno.value.length < 13) {
                    alert("Please provide a valid credit card number!");
                    document.myForm.creditno.focus();
                    return false;
                }

                if (!document.myForm.creditno.value.match(zip)) {
                    alert("Please provide a valid credit card number!");
                    document.myForm.creditno.focus();
                    return false;
                }

                alert("The form was submitted");
            }
        </script>
    </head>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <p>
        <form action="" name="myForm" onsubmit="return (validate())" ;>
            Username:
            <input name="user" type="text" size="25">
            <br>Password:
            <input name="pass" type="password" size="20">
            <br>Confirm Password:
            <input name="pass1" type="password" size="20">
            <br>First Name:
            <input name="first" type="text" size="30">
            <br>Last Name:
            <input name="last" type="text" size="30">
            <br>
            <br>Address:
            <input name="address" type="text" size="50">
            <br>City:
            <input name="city" type="text" size="35">
            <br>State:
            <input name="state" type="text" size="25">
            <br>Zip Code:
            <input name="zip" type="text" size="5">
            <br>
            <br>**Credit Card:
            <br>
            <input name="creditcard" type="radio">Visa
            <br>
            <input name="creditcard" type="radio">Mastercard
            <br>
            <input name="creditcard" type="radio">American Express
            <br>
            <br>** Credit Card #.
            <input name="creditno" type="password" size="25">
            <br>
            <br>We welcome your comments and feedback:
            <br>
            <textarea maxlength="100"></textarea>
            <br>
            <input type=submit value="Submit Query">
            <input type=reset>

        </form>

        </p>
    </body>
</html>