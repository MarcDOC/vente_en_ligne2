import { get } from "./database.js";
import { TableDashboardItem } from "./components/TableDashboardItem.js";

//
const boxListTables = document.querySelector("#boxListTables")
const tables = get("table") 

for (let table of tables) {
    const t = new TableDashboardItem(table)
    t.appendTo(boxListTables)
}

//recupere les prix des  commandes et affiche le prix total
// nombre total de commande 
const commandes = get('commande')
document.querySelector('#total_commande').innerHTML = commandes.length

let totalventes =0;
for (let commande of commandes){
    totalventes+=parseInt(commande.prix_total) 

}
document.querySelector('#total_vendus').innerHTML = totalventes

// affiche le nombre total des employee dispponible
const employes = get('employee')
document.querySelector('#total_employee').innerHTML = employes.length

// affiche le nombre total des menu dispponible
const menu = get('menu')
document.querySelector('#total_menu').innerHTML = menu.length
