
var URL = location.href;

if ((URL.indexOf("www.bradesconext.com.br") != -1) || (URL.indexOf("bradesconext.com.br") != -1)) {
    top.location.href = 'http://www.banco-virtual.com.br/next/BancoVirtualNext/Home/index.shtml';
}
else {
    if (URL.indexOf("www.rhcensodeinclusao.com.br") != -1 || URL.indexOf("rhcensodeinclusao.com.br") != -1) {
        top.location.href = '/centro-de-inclusao/index.html';
    }
    else {
        if (URL.indexOf("promocoes/index.shtm") < 1 || URL.indexOf("poder_publico") < 1 || URL.indexOf("bradescopoderpublico") < 1) {
            var endsite = "http://www.banco-virtual.com.br/html/classic/index.shtm";
            var urlatual = document.URL.replace('http://www.banco-virtual.com.br', '');

            if ((self.parent && !(self.parent === self)) && (self.parent.frames.length != 0)) {
                self.parent.location = endsite
            }
            /*
            try {
                if (parent.parent.document.URL) {
                    if (parent.frames.length > 1) {
                        top.location.href = endsite;
                    }
                }
            }
            catch (e) {
                var detect = navigator.userAgent.toLowerCase();
                if (detect.indexOf('mac') < 1) {
                    //Catch caso carrege de um iframe
                    top.location.href = endsite;
                }
            }
			
            var c = new Array();
            c[0] = "www.banco-virtual.com.br";
            c[1] = "d4312s";
            c[2] = "10.243";

            var localizado = 0;
            for (f = 0; f <= c.lenght; f++) {
                if (URL.indexOf(c[f]) > 1) {
                    localizado = 1;
                }
            }
            if (localizado == 0) {                
                location.href = endsite;
            }
			*/
        }

    }

}