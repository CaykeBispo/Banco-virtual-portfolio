var meuBrowser = navigator.appVersion
var versaoIe = [
    'MSIE 10',
    'MSIE 9',
    'MSIE 8',
    'MSIE 7',
    'MSIE 5',
]
for (var i = 0; i < versaoIe.length; i++) {
    if (meuBrowser.indexOf(versaoIe[i]) >= 0) {
        $('#intervencaoIE').load('/assets/common/inc/modalIntervencaoIe.shtm')
    }
}