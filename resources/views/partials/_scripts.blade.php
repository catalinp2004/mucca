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

<script src="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.2/dist/cookieconsent.js"></script>
<script>
    document.body.classList.toggle('c_darkmode');
    var cc = initCookieConsent();
    cc.run({
        autorun : true,
        auto_language: true,
        autoclear_cookies: true,
        languages: {
            'en' : {
                consent_modal : {
                    title :  "We have cookies!",
                    description :  'Our website uses cookies to offer you the best possible experience for your visit. You can read more about our <a href="/info#cookies" rel="noopener" target="_blank">Cookies Policy</a>.',
                    primary_btn: {
                        text: 'Accept all',
                        role: 'accept_all'          //'accept_selected' or 'accept_all'
                    },
                    secondary_btn: {
                        text : 'Accept necessary',
                        role : 'accept_necessary'   //'settings' or 'accept_necessary'
                    }
                },
                settings_modal : {
                    title : 'Cookie preferences ...',
                    save_settings_btn : "Save settings",
                    accept_all_btn : "Accept all",
                    blocks : [
                        {
                            title : "First block title ...",
                            description: 'First block description ...'
                        },{
                            title : "Second block title ...",
                            description: 'Second block description ...',
                            toggle : {
                                value : 'my_category1',
                                enabled : true,
                                readonly: true
                            }
                        },{
                            title : "Third block title ...",
                            description: 'Third block description ...',
                            toggle : {
                                value : 'my_category2',
                                enabled : true,
                                readonly: false
                            }
                        }
                    ]
                }
            }
        }
    })
</script>