{{--<!-- BOOTSTRAP SCRIPTS -->--}}
{{--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>--}}
<script defer src="{{ asset('js/app.js') }}"></script>

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

@yield('scripts')
