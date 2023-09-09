import {get, save } from "./database.js";
import { TableItem } from "./components/TableItem.js";

const boxListTables = document.querySelector("#boxListTables")
const tables = get("table")

for (let table of tables) {
    const t = new TableItem(table)
    t.appendTo(boxListTables)
}

const addTableForm = document.querySelector('#addTableForm')
addTableForm.addEventListener('submit', e => onSubmitFormAddTable(e))

function onSubmitFormAddTable(e) {
    e.preventDefault()
    const numero = new FormData(e.currentTarget).get('numero').toString().trim()
    const place = new FormData(e.currentTarget).get('place').toString().trim()
    const forme = new FormData(e.currentTarget).get('forme').toString().trim()
    const position = new FormData(e.currentTarget).get('position').toString().trim()

    const table = { numero, place, forme, position, }

    const t = new TableItem(table)
    t.prependTo(boxListTables)
    addTableForm.reset();

    tables.push(table)
    save('table', tables)
}