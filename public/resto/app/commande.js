import {get, save, getOne } from "./database.js";
import { CommandeItem } from "./components/CommandeItem.js";
import { createElement } from "./dom.js";

const boxListCommandes = document.querySelector("#boxListCommandes")
const commandes = get("commande")

for (let commande of commandes) {
    const t = new CommandeItem(commande)
    t.appendTo(boxListCommandes)
}

const addCommandeForm = document.querySelector('#addCommandeForm')
addCommandeForm.addEventListener('submit', e => onSubmitFormAddCommande(e))

function onSubmitFormAddCommande(e) {
    e.preventDefault()
    const numero_table = new FormData(e.currentTarget).get('numero_table').toString().trim()
    const nombre_personne = new FormData(e.currentTarget).get('nombre_personne').toString().trim()

    const quantite = new FormData(e.currentTarget).get('quantite').toString().trim()
    const menu = new FormData(e.currentTarget).get('menu').toString().trim()
    

    const menuinstorage = getOne('menu', menu)
    let prix_total = 0;
    if(menuinstorage){
        prix_total = parseInt(menuinstorage.prix) * parseInt(quantite)
    }


    const id = 1 + commandes.length
    const commande = {
        numero: 'COM00' + id,
        numero_table,
        nombre_personne,
        prix_total: prix_total,
        contenu: [{ quantite, menu }],
    }

    const t = new CommandeItem(commande)
    t.prependTo(boxListCommandes)
    addCommandeForm.reset();

    commandes.push(commande)
    save('commande', commandes)
}


const tables= get('table')
const number_table=document.querySelector('#numero_table') 
for (let table of tables){
    const option= createElement('option', {
        value: table.numero
    })
    option.innerHTML= table.numero
    number_table.append(option)

}

const menus = get('menu')
const selectmenu=document.querySelector('#menu')
for( let menu of menus){
    const option = createElement('option',{
        value: menu.code
    })
    option.innerHTML= menu.nom
    selectmenu.append(option)
}
