<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<?php if (LOGGED_IN) { ?>
    <script src = "assets/content-tools/content-tools.min.js" ></script >
    <script src = "assets/content-tools/editor.js" ></script >
    <script src = "js/backup.js"></script >
<?php } ?>
</body>
</html>