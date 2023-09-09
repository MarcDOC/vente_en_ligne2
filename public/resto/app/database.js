// les function qui recupre les cle et valeur dans le localstorage
export function get(key) {
    const dataInStorage = localStorage.getItem(key)
    let data = []
    if (dataInStorage) {
        data = JSON.parse(dataInStorage)
    }
    return data;
}

export function save(key, data) {
    localStorage.setItem(key, JSON.stringify(data))
}


export function getOne(key, code) {
    const dataInStorage= localStorage.getItem(key)
    if (dataInStorage){
        if(key == 'menu'){
            for(let menu of JSON.parse(dataInStorage)){
                if(menu.code == code){
                    return menu;
                }
            }
        }
    }
    
    return null;
   
}

//functionpour determiner le nombre de place disponible sur une tables
export function getPlaceOccuper(numero) {
    const dataInStorage= localStorage.getItem('commande')
    let placeOccuper = 0;
    if (dataInStorage){
       
            for(let commande of JSON.parse(dataInStorage)){
                if(commande.numero_table == numero){
                    placeOccuper+= parseInt(commande.nombre_personne)
                }
            }
        
    }
    
    return placeOccuper;
   
}