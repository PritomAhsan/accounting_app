/* Keep previous tab open on page refresh */

$('.tab-page-refresh > ul.nav-tabs > li > a').on('shown.bs.tab', function (e) {
    localStorage.chartOfAccountTabId = $(e.target).attr('href');
});

$(document).ready(function () {
    currentUrl = window.location.href;
    if (currentUrl.match('chart-of-account')) {
        if (tabId = localStorage.chartOfAccountTabId) {
            $('.tab-page-refresh > ul.nav-tabs li a').removeClass('active');
            $('.tab-page-refresh > .tab-content .tab-pane').removeClass('active show');

            $('.tab-page-refresh > ul.nav-tabs li a').each(function () {
                if ($(this).attr('href').match(tabId)) {
                    $(this).addClass('active');
                }
            });
            $(tabId).addClass('active show');
        }
    }
});
