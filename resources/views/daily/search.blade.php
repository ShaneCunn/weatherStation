<div id="loading-bar"></div>
<div id="header" class="header">
    <div class="header-content">
        <div class="header-col header-col-logo"><a href="https://meteo.test/">
                <div class="logo"></div>
            </a></div>
        <div class="header-col-content">
            <div class="search-content">
                <div class="search-container">
                    <input type="text" name="search" id="search-input" class="search-input" tabindex="1"
                           autocomplete="off" autocapitalize="off" autocorrect="off"
                           data-search-url="https://meteo.test/requests/search"
                           data-token-id="aa0520bfe3855ed4de2e828720f347ae7c60ec27d77304d592607564c654cb6b"
                           data-autofocus="0" placeholder="City name">
                    <div id="clear-button" class="clear-button"></div>
                    <div id="search-button" class="search-button"></div>
                    <div class="fav-list">
                        <div class="fav-list-icon fav-list-close" onclick="closeFavorites()"></div>
                        <div class="fav-list-title">Favorites</div>
                        <div class="fav-list-container">
                        </div>
                    </div>
                    <div class="search-list">
                        <div class="search-list-icon search-list-close" onclick="closeSearchResults()"></div>
                        <div class="search-list-title">Search Results</div>
                        <div class="search-list-container" id="search-results"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-col header-col-menu">
            <div class="header-menu-el">
                <div class="icon header-icon icon-menu menu-button" id="db-menu" data-db-id="menu"></div>
                <div class="menu" id="dd-menu">
                    <div class="menu-content">
                        <div class="menu-title">Preferences</div>
                        <div class="divider"></div>

                        <a href="https://meteo.test/preferences/language">
                            <div class="menu-icon icon-language"></div>
                            Language</a>
                        <a href="https://meteo.test/preferences/theme">
                            <div class="menu-icon icon-theme"></div>
                            Theme</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
