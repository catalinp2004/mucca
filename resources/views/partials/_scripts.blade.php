<script>
    function collapseNav() {
        var target = document.getElementById("home-menu-collapse");
        var togglerWrap = document.getElementsByClassName("toggler-wrapper")[0];
        var background = document.getElementsByClassName("welcome-section")[0];
        if (togglerWrap.classList.contains("collapsed")) {
            togglerWrap.classList.remove("collapsed");
        } else {
            togglerWrap.classList.add("collapsed");
        };

        if (background.classList.contains("collapsed")) {
            background.classList.remove("collapsed");
        } else {
            background.classList.add("collapsed");
        };

        if (target.classList.contains("show")) {
            target.classList.remove("show");
        } else {
            target.classList.add("show");
        }
    };
</script>
