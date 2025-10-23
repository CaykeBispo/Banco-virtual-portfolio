<?php

abstract class Lorem {
    public static function ipsum($nparagraphs) {
        $paragraphs = [];
        for($p = 0; $p < $nparagraphs; ++$p) {
            $nsentences = random_int(3, 8);
            $sentences = [];
            for($s = 0; $s < $nsentences; ++$s) {
                $frags = [];
                $commaChance = .33;
                while(true) {
                    $nwords = random_int(3, 15);
                    $words = self::random_values(self::$lorem, $nwords);
                    $frags[] = implode(' ', $words);
                    if(self::random_float() >= $commaChance) {
                        break;
                    }
                    $commaChance /= 2;
                }

                $sentences[] = ucfirst(implode(', ', $frags)) . '.';
            }
            $paragraphs[] = implode(' ', $sentences);
        }
        return implode("\n\n", $paragraphs);
    }

    public static function ipsumWords($size){
        $str = "";
        for($i = 0; $i < $size; $i++){
            $str .= self::$lorem[rand(0,count(self::$lorem)-1)]." ";
        }
        return ucfirst(trim($str));
    }

    private static function random_float() {
        return random_int(0, PHP_INT_MAX - 1) / PHP_INT_MAX;
    }

    private static function random_values($arr, $count) {
        $keys = array_rand($arr, $count);
        if($count == 1) {
            $keys = [$keys];
        }
        return array_intersect_key($arr, array_fill_keys($keys, null));
    }

    private static $lorem = ["Stu","weekend","dirigenti","anu","firmatu","pattu","fine","milioni","dosi","possinu","ghjunghje","direttamente","paesi","sviluppu","Cuntendu","tutte","prumesse","dapoi","principiu","guverni","bloccu","fattu","questu","significerebbe","miliardu","stata","alcuna","precisazione","nantu","furnisce","questa","differenza","milioni","dichjarazione","publicata","Facilità","Covax","riunione","cunsorziu","creatu","assicurà","trasferimentu","vaccini","mondu","indicatu","grande","donazione","canalizata","meccanisimu","distribuzione","internaziunale","fonti","cunfirmatu","colonna","prevede","investimentu","implica","reali","immubiliare","parechje","persone","vantaghju","capisce","impatta","valori","patrimoniu","pruduttu","mercatu","finanziariu","necessariu","listessu","numeru","variabili","fluttuazione","prezzi","mercatu","operanu","mente","dunque","impiegà","diversu","intuizione","sbagliu","intuizione","necessariu","cunnosce","particularità","pruvendu","tendenze","attuali","guadagnà","dedicate","invece","avventurieru","decisione","immubiliare","pigliatu","cunnosce","criteri","preparatu","mercatu","immubiliare","Ministeriu","Ghjustizia","Sicurezza","Pubblica","autorizatu","Naziunale","sustegnu","grande","indigena","Leghje","Malnutrizione","zitelli","Covid","Capite","Mineria","Problemi","Afflivenu","regione","situata","nantu","rive","Uraricoera","dapoi","maghju","stata","seria","cunflitti","minatori","listessu","ministru","Barroso","scena","armati","populi","indigeni","fine","mese","urdinatu","guvernu","misure","prutege","publicata","stata","ministru","ducumentu","sustegnu","essenziali","persone","Cinque","stati","brasiliani","cumpresu","fronte","cunsiderata","peghju","secondu","guvernu","federale","publicatu","storia","emergenza","periodu","ghjugnu","alerta","prima","settembre","perchè","piuvitu","Sicondu","spezialisti","mancanza","pioggia","Brasile","Deforestazione","riscaldamentu","combustione","combustibili","fossili","Fenomenu","Naturale","mancanza","rubinetti","blackouts","impatti","significativi","ecunumia","scienziatu","siccità","risicu","electricità","fattura","annantu","secondu","atmosferica","eruditu","traiettoria","Naziunale","raprisenta","federale","Semu","una","mette","brasiliana","cuntrollu","casa","puderia","ecunumia","basata","carne","fattibile","esportatori","Vulemu","risichi","cumitatu","guvernu","emessa","precipitazione","cunsideratu","situati","frescu","capitale","sottu","guvernu","alerta","memoria","cinque","maghju","crisa","l'acqua","righjuntu","publicatu","Sicondu","Meteorulugia","deficit","s'applica","stata","vulume","capacità","agenzie","guasi","brasiliana","vacca","vulnerabilità","puderia","collassassi","sicchia","Sabesp","cuminciatu","Afganistan","ponu","Cunsideratu","percentuale","quarantena","vaccinate","vaccinazione","contaminazione","decisione","vaccinati","studiu","riduce","paesi","prufessore","permette","stabilitu","parolle","l'Unione","Europea","risicu","turisti","varianti","prima","publicatu","paesi","quellu","settimane","casi","Cuntrollu","bisognu","distanzamentu","gradu","prevalente","Mondiale","Salute","trasmissibile","mutazioni","l'agenzia","Pfizer","Janssen","mondu","lasciate","cumpresu","cuminciatu","schema","vaccinati","territoriu","intervistati","parolle","viaghjà"];
}