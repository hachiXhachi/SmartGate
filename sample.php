<?php
include 'includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>\
    <script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
    <script>
        window.OneSignalDeferred = window.OneSignalDeferred || [];
        OneSignalDeferred.push(function (OneSignal) {
            OneSignal.init({
                appId: "13801d4b-54a8-4cb0-8a32-c8b4ca00d925",
            });
        });
    </script>
</head>

<body>

</body>
<!-- <script>
    OneSignal.push(function () {
        var isPushSupported = OneSignal.isPushNotificationsSupported();
        if (isPushSupported) {
            console.log('yes');
            OneSignal.isPushNotificationsEnabled(function (isEnabled) {
                if (isEnabled) {
                    console.log('enabled');
                } else {
                    console.log('no');
                    OneSignal.push(function () {
                        OneSignal.showHttpPrompt();
                    });
                }
            });
        } else {
            console.log('no');
        }
    });

</script> -->

</html>